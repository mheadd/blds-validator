#!/bin/bash

# A script to validate a BLDS file in CSV format.
# More information on the BLDS standard is here:
# https://github.com/open-data-standards/permitdata.org/wiki

# Check required commands
command -v csvclean >/dev/null 2>&1 || { echo "You need to install csvkit to continue. https://csvkit.readthedocs.org/en/0.9.1/install.html." >&2; exit 1; }
command -v php >/dev/null 2>&1 || { echo "You need to install php to continue. http://php.net/manual/en/install.php." >&2; exit 1; }

# Prompt the user if no argument supplied.
if [ $# -eq 0 ]
  then
    echo "> Pass in the name of the file you want to check:"
    echo "> ~$ ./validator.sh path/to/permits.csv"
    exit 1
fi

# Name of file to check.
FILE=$1

# Check if the file is a valid CSV file.
CHECK=$(csvclean -n $FILE)
if [[ $CHECK = "No errors." ]]
then
	echo "CSV file is valid."
else 
	echo $CHECK
	exit 1
fi

# Check for all required fields.
head -n 1 $FILE | php validator.php