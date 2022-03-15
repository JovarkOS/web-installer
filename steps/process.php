<?php

// append text to the end of install_script.sh
// All instructions modified from https://wiki.archlinux.org/title/Installation_guide

// Create new file object
$script = file("install_script.sh");
file_put_contents("#!/bin/bash", $script);

// -- Use timedatectl(1) to ensure the system clock is accurate:
file_put_contents("timedatectl set-ntp true", $script);

// -- Use fdisk or parted to modify partition tables. For example:
// file_put_contents("sudo fdisk /dev/sda", $script);