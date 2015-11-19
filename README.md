[![Code Climate](https://codeclimate.com/github/renepenner/mage-tools/badges/gpa.svg)](https://codeclimate.com/github/renepenner/mage-tools)

# MageTools

MageTools are a set of scripts to support a Magento environment.

''THIS is just a first experiment - ABSOLUTE BETA -> NO PRODUCTIV''

## create-localxml

with the create-localxml.php can you create a local.xml from a template located
in conf/magento/ folder. All placeholders will be replaced with values in
JSON files.

```
 conf/magento/local.xml       <-- template
 conf/magento/default.json    <-- default config values
 conf/magento/develop.json    <-- values for develop scope
```
