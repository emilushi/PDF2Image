#This aplication is about converting pdf doc to image throught the web.
> We support these three case to convert PDF doc to Image
>
> ## Use gviewer
>
> After checkout the code u must install gviewer with these commands
> To install gviewer use these commands:
>
>>	1.	### ./configure
>>	2.	### ./make
>>	3.	### cp pdf2img /usr/bin
>
>
> ## Use ImageMagick
>
> We suggest running these commands to install ImageMagick (example: Distro [Debian/Ubuntu])
>
>>	1.	### apt-get install php5-dev imagemagick libmagickwand-dev
>>	2.	### pecl install imagick
>>	3.	### apt-get install php5-imagick

> ## Use Convert
>
> [convert] is a unix/linux command pre-installed in some distro.
>
# To choose using one the cases above to convert PDF to image you must modify config.php
>
> First set the path of pdf and image folder following the instructions in the file
>
> And set USELIB to do the convertions
>
# Requirements
>
> Do use the PHP code in this project you will need PHP 5.3 or higher installed on your server
> If you choose to use gviewer you will need Administrator Permissions to install it on your server
> To install ImageMagick there are no permissions required
>
# Other Information
>
> In the index.php file is included a upload form that after uploading the pdf doc it will redirect you 
> to the output page but before testing it you will need to edit the base url on the upload_file.php on line 23
