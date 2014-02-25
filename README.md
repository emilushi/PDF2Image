# We support these three case for convert PDF in to Image
>
> ## Use gviewer
>
> We provide a program to convert pdf in to image.
> After checkout the code u must install gviewer with these commands
>
>>	1.	### ./configure
>>	2.	### ./make
>>	3.	### cp pdf2img /usr/bin
>
>
> ## Use ImageMagick
>
> Maybe you need to run these commands to install ImageMagick (example: Distro [Debian/Ubuntu])
>
>>	1.	### apt-get install php5-dev imagemagick libmagickwand-dev
>>	2.	### pecl install imagick
>>	3.	### apt-get install php5-imagick

> ## Use Convert
>
> [convert] is a unix/linux command pre-installed in some distro.
>
# To choose one the cases above you must be modify config.php
>
> First setting the path of pdf and image folder following the instructions in file
>
> And setting the USELIB to do the convertions
>