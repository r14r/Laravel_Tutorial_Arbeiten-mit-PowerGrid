#!/usr/bin/env python

import argparse
import json
import sqlite3
import sys

DATABASE_TABLE = "films"

loglevel = 2
def log(level, line):
    if level <= loglevel:
        print(line)
        
def load_json_data(file_path):
    with open(file_path, 'r') as file:
        return json.load(file)

def connect_to_database(db_path):
    return sqlite3.connect(db_path)

def create_table_based_on_json(cursor, data, drop_first = False):
    if not data:
        raise ValueError("No data available to determine the schema.")

    first = data[0]
    
    if drop_first:
        log(1, f"Drop   Table {DATABASE_TABLE}")
        sql = f"DROP TABLE IF EXISTS {DATABASE_TABLE}"
        cursor.execute(sql)
        
    columns = ', '.join([f"{key.lower()} TEXT" for key in first.keys()])

    log(1,f"Create Table {DATABASE_TABLE}")

    sql = f"CREATE TABLE IF NOT EXISTS {DATABASE_TABLE} (id INTEGER PRIMARY KEY, {columns})"
    cursor.execute(sql)
    

def insert_json_data(cursor, data):
    log(1, f"Insert {len(data)} items")

    for item in data:
        keys = tuple(key.lower() for key in item.keys())
        values = tuple(item.values())
        placeholders = ', '.join('?' * len(keys))
        sql = f"INSERT INTO {DATABASE_TABLE} ({', '.join(keys)}) VALUES ({placeholders})"
        cursor.execute(sql, values)

def main():
    parser = argparse.ArgumentParser(description='EyeTV Parser')

    #parser.add_argument('param1', type=int, help='A positional integer parameter')
    parser.add_argument('--sqlite',          type=str, default='database.sqlite', help="SQLite Database. Default is 'database.sqlite'")
    parser.add_argument('--json',            type=str, default=None, help="JSON Outfile. Default is 'None'")
    parser.add_argument('--drop-if-exists',  action="store_true", help="Drop table 'film' if exists in SQLite Database")

    args = parser.parse_args()
    
    if args.json is None:
        parser.print_help()
        sys.exit()
        
    json_file_path = args.json
    films = load_json_data(json_file_path)
    for film in films:
        for k in film.keys():
            if film[k]:
                film[k] =  film[k].replace("\n", "<br>")

    # Connect to SQLite database
    db_path = args.sqlite
    conn = connect_to_database(db_path)
    cursor = conn.cursor()

    # Create table based on JSON structure and insert data
    create_table_based_on_json(cursor, films, args.drop_if_exists)
    insert_json_data(cursor, films)
    conn.commit()

    # Close the database connection
    conn.close()

if __name__ == "__main__":
    main()


