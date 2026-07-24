this is a medical software build in php old version, there is no structure every page is manually codded. i need to update lab report pages but there are approximately over 500 to 600 lab report pages (according to customer) but the pages or file name are difficult to find,

first make me a page
use http://localhost/sfmm/teslab.php as example add a menu there call "lab report approval flow"
there user can fill form with
Select Category ("Select DISTINCT subtype from radio where type='lab';")  
and Checked by (multiple user) with signature upload (SELECT _ FROM `user` WHERE `utype` = 'lab' AND `status` IN ('active', 'Active');)
and Consultant (multiple user) with signature upload (SELECT _ FROM `user` WHERE `utype`='doctor' AND `status` IN ('active', 'Active');)

for a lab report page please run sql
SELECT DISTINCT(`report`) FROM `radio` WHERE type='lab'; will provide you 72 report page that are in the software. each page has its own db table, no need to update or modify those tables unless you relly necessary (if you modify any db table please make a file for me with sql commands so that i can modify easily with those commands).
update those pages only for footer add Result Updated By, Result Checked By and Consultant. only Checked By and Consultant will have their signature in the footer, the order oder of the footer design will be for example 1. Checked by, 2. signature, 3. name, 4. Designation

there are other lab report pages that might exist for example
i only can figure out for inpatient lab test
SELECT DISTINCT(`report`) FROM `iinves` WHERE `report` LIKE '%.php';
show 82 report php reprot page, there could be others.

another thing i also need to update for emergency lab report
SELECT DISTINCT(`report`) FROM `einves` WHERE `report` LIKE '%.php';
return 47 but there could be more php file

for db connection you can check db1.php,
for existing lab report example coding patern you can check files from (SELECT DISTINCT(`report`) FROM `radio` WHERE type='lab';)

all the file you modify please keep it in a file name new_lab_files
