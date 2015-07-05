#!/bin/bash

WHERE=`pwd`

TGZ_NAME="yaps-1.1.0-2.tgz"
DIR_NAME="yaps"

cd ..
tar -cvz --exclude=OLD --exclude=work --exclude=*~ --exclude=CVS --exclude=.?* --exclude=np --exclude=.cvsignore -f $TGZ_NAME $DIR_NAME
cd "$WHERE"
