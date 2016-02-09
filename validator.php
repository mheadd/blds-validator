<?php

/* 
 * A PHP script to check field names in a BLDS CSV file.
 */ 

// Include Spyc class to parse YAML files with BLDS field names.
include('utils/Spyc.php');

// Load BLDS fields.
$required_fields = Spyc::YAMLLoad('fields/required.yaml');
$recommended_fields = Spyc::YAMLLoad('fields/recommended.yaml');
$optional_fields = Spyc::YAMLLoad('fields/optional.yaml');

// Gets the header row from STDIN.
$line = trim(fgets(STDIN));
$fields = explode(',', $line);

// Check that each required field is present.
foreach($required_fields as $field) {
	if(!in_array($field, $fields)) {
		die("ERROR: missing field " . $field);
	}
}
echo "All required fields included.\n\n";

// Check recommended fields.
$recommended = array_intersect($recommended_fields, $fields);
echo "The following recommended fields are included:\n" . implode(', ', $recommended) . "\n\n";

// Check optional fields.
$optional = array_intersect($optional_fields, $fields);
echo "The following optional fields are included:\n" . implode(', ', $optional). "\n\n";
