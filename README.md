# BLDS File Validator

A simple validator for CSV files in the [BLDS data format](http://permitdata.org/).

## Usage

Make sure the ```validator.sh``` file is executable. Invoke thusly

```bash
~$ ./validator.sh path/to/blds-permits.csv
```

This validator checks for fileds in the [Core Permits Dataset](https://github.com/open-data-standards/permitdata.org/wiki/Core-Permits-Dataset-Requirements) outlined in the BLDS standard - this is the only file that is required under BLDS. The validator will raise errors only when `required` fields are absent, not when non-standard `optional` or `recommended` fields are ommited. 
