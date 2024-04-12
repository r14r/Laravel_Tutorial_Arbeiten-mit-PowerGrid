#!/usr/bin/env python

from collections import defaultdict
import os
import json
import sys
import xml.etree.ElementTree as ET

import argparse


def xml_to_json(xml_file):
    def etree_to_dict(tree):
        items = {}

        children = list(tree)
        if children:
            key = "dict"
            val = ""

            for child in children:
                tag = child.tag
                val = child.text

                if tag in ["dict", "array"]:
                    items[key] = etree_to_dict(child)
                elif tag == "key":
                    key = val
                elif tag in ["string", "integer", "true"]:
                    items[key] = val

        if tree.attrib:
            pass
            # d[tree.tag].update(("@" + k, v) for k, v in tree.attrib.items())

        if tree.text:
            text = tree.text.strip()
            if children or tree.attrib:
                if text:
                    pass
                    # d[tree.tag]["#text"] = text
            else:
                pass
                # d[tree.tag] = text

        return items

    tree = ET.parse(xml_file)
    root = tree.getroot()

    return etree_to_dict(root)


def main(root):
    for root, dirs, files in os.walk(root):
        for name in files:
            if name.endswith(".eyetvp"):
                full_path = os.path.join(root, name)

                print(f"Parse {full_path}", file=sys.stderr)
                yield full_path, xml_to_json(full_path)["dict"]


if __name__ == "__main__":
    keys_to_keep = [ "TITLE", "ABSTRACT", "ACTORS", "AUDIO", "CONTENT", "COUNTRY", "DESCRIPTION", "DIRECTOR", "DURATION", "EPISODECOUNT", "EPISODENUM", "FORMAT", "FSK", "LANGUAGE", "OTHERS", "YEAR", ]

    parser = argparse.ArgumentParser(description='EyeTV Parser')

    #parser.add_argument('param1', type=int, help='A positional integer parameter')
    parser.add_argument('--root', type=str, default='/Volumes/eyetv', help='Start folder')
    parser.add_argument('--output', type=str, default="files.json", help='JSON Outfile')

    args = parser.parse_args()

    print(args)

    result = []
    for full_path, data in main(args.root):
        if "epg info" in data:
            eyetv = {"TITLE": data["display title"], **data["epg info"]}
        else:
            eyetv = {"TITLE": data["display title"]}
            
        eyetv_filtered = {k: eyetv[k] for k in keys_to_keep if k in eyetv}

        result.append( { "FULL_PATH": full_path, **eyetv_filtered } )

    if args.output:
        with open(args.output, 'w') as file:
            file.write(json.dumps(result, indent=4))
    else:
        print(json.dumps(result, indent=4))
