# This file has settings for the Make of this project.
# Targets must exist in the bin/make-file/targets/ directory.

.SILENT:
CURRENT_DIR := $(shell pwd)

install:
	composer install --prefer-dist
    
#CommonSdk
ifneq ($(wildcard vendor/gpupo/common-sdk/bin/make-file/targets/*),)
    include vendor/gpupo/common-sdk/bin/make-file/variables.mk
    include vendor/gpupo/common-sdk/bin/make-file/define.mk
    include vendor/gpupo/common-sdk/bin/make-file/help.mk
    include vendor/gpupo/common-sdk/bin/make-file/functions/*
    include vendor/gpupo/common-sdk/bin/make-file/targets/*
endif
#CommonDev
ifneq ($(wildcard vendor/gpupo/common-dev/bin/make-file/targets/*),)
	include vendor/gpupo/common-dev/bin/make-file/targets/*
endif
## Include custom Targets:
# include bin/make-file/variables.mk
# include bin/make-file/define.mk
#
# include bin/make-file/functions/*.mk
# include bin/make-file/targets/*.mk
