# Frontend of the extendet Version

## Register Program

Add entry to global variable `programs` or in the `programs.js`

|Property|Format \| Example|Discription|Optional|
|---|---|---|---|
|name|string "xxx"|name of application|no|
|icon|css string "url()"|icon of application|yes|
|pos|string "1px 2em"|position of image|yes|
|start|function|function on start|yes|
|permissions|object {"notify":true}|requested and granted permisssions|yes|
|shattr|array of string ["open last","function"]|start attributes for taskbar|yes|

## Build-in functions

|Function|Discription|Requires|
|---|---|---|
|createWindow(Title,Html)|Create a window with the title and inner html||
|notify(index,message)|creates a notification with the message. Index of program array needed|Permission "notify"|
|alert(index,message)|standart function `alert` but with index for build-in manage|Permission "notify"|
|checkPerm(index,permission)|checks permission and return value. Creates a question if not granted||
|formatted_date(integer)|format date and time based on given integer||

Some functions are callable and not listed here. Please don't use them.
