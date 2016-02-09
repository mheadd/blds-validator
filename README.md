# BLDS File Validator

A simple validator for CSV files in the [BLDS data format](http://permitdata.org/).

## Usage

Make sure the ```validator.sh``` file is executable. Invoke thusly

```bash
~$ ./validator.sh path/to/blds-permits.csv
```

## Limitations

Currently, this validator only checks fileds in the Core Permits Dataset outlined in the BLDS standard - this is the only file that is required under BLDS. It does not check other optional files which may be bundled together with the Core Permits Dataset file.

Note - the validator will fail only when ```required``` fields are absent, not when non-standard ```optional``` or ```recommended``` fields are included. 