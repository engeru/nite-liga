<?php
$dbSettings = json_decode(file_get_contents(__DIR__.'/db-set.json'), true);
return $dbSettings;
//add to db-set.json when going for production
// Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
