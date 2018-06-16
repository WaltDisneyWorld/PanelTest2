<?php

//   -------------------------------------------------------------------------------
//  |                  net2ftp: a web based FTP client                              |
//  |              Copyright (c) 2003-2017 by David Gartner                         |
//  |                                                                               |
//  | This program is free software; you can redistribute it and/or                 |
//  | modify it under the terms of the GNU General Public License                   |
//  | as published by the Free Software Foundation; either version 2                |
//  | of the License, or (at your option) any later version.                        |
//  |                                                                               |
//   -------------------------------------------------------------------------------

//   -------------------------------------------------------------------------------
//  | For credits, see the credits.txt file                                         |
//   -------------------------------------------------------------------------------
//  |                                                                               |
//  |                              INSTRUCTIONS                                     |
//  |                                                                               |
//  |  The messages to translate are listed below.                                  |
//  |  The structure of each line is like this:                                     |
//  |     $message["Hello world!"] = "Hello world!";                                |
//  |                                                                               |
//  |  Keep the text between square brackets [] as it is.                           |
//  |  Translate the 2nd part, keeping the same punctuation and HTML tags.          |
//  |                                                                               |
//  |  The English message, for example                                             |
//  |     $message["net2ftp is written in PHP!"] = "net2ftp is written in PHP!";    |
//  |  should become after translation:                                             |
//  |     $message["net2ftp is written in PHP!"] = "net2ftp est ecrit en PHP!";     |
//  |     $message["net2ftp is written in PHP!"] = "net2ftp is geschreven in PHP!"; |
//  |                                                                               |
//  |  Note that the variable starts with a dollar sign $, that the value is        |
//  |  enclosed in double quotes " and that the line ends with a semi-colon ;       |
//  |  Be careful when editing this file, do not erase those special characters.    |
//  |                                                                               |
//  |  Some messages also contain one or more variables which start with a percent  |
//  |  sign, for example %1\$s or %2\$s. The English message, for example           |
//  |     $messages[...] = ["The file %1\$s was copied to %2\$s "]                  |
//  |  should becomes after translation:                                            |
//  |     $messages[...] = ["Le fichier %1\$s a �t� copi� vers %2\$s "]             |
//  |                                                                               |
//  |  When a real percent sign % is needed in the text it is entered as %%         |
//  |  otherwise it is interpreted as a variable. So no, it's not a mistake.        |
//  |                                                                               |
//  |  Between the messages to translate there is additional PHP code, for example: |
//  |      if ($net2ftp_globals["state2"] == "rename") {           // <-- PHP code  |
//  |          $net2ftp_messages["Rename file"] = "Rename file";   // <-- message   |
//  |      }                                                       // <-- PHP code  |
//  |  This code is needed to load the messages only when they are actually needed. |
//  |  There is no need to change or delete any of that PHP code; translate only    |
//  |  the message.                                                                 |
//  |                                                                               |
//  |  Thanks in advance to all the translators!                                    |
//  |  David.                                                                       |
//  |                                                                               |
//   -------------------------------------------------------------------------------


// -------------------------------------------------------------------------
// Language settings
// -------------------------------------------------------------------------

// HTML lang attribute
$net2ftp_messages["en"] = "ua";

// HTML dir attribute: left-to-right (LTR) or right-to-left (RTL)
$net2ftp_messages["ltr"] = "ltr";

// CSS style: align left or right (use in combination with LTR or RTL)
$net2ftp_messages["left"] = "left";
$net2ftp_messages["right"] = "right";

// Encoding
$net2ftp_messages["iso-8859-1"] = "windows-1251";

// -------------------------------------------------------------------------
// Messages
// -------------------------------------------------------------------------

$net2ftp_messages["%1\$s File"] = "%1\$s ����";
$net2ftp_messages["(Note: This link may not work if you don't have your own domain name.)"] = "(�������: ��������� ���� �� ���������, ���� � ��� ���� ��������� �����.)";
$net2ftp_messages["<b>%1\$s</b> could not be renamed to <b>%2\$s</b>"] = "<b>%1\$s</b> �� ������� ������������� � <b>%2\$s</b>";
$net2ftp_messages["<b>%1\$s</b> was successfully renamed to <b>%2\$s</b>"] = "<b>%1\$s</b> ���� ���i��� ������������� � <b>%2\$s</b>";
$net2ftp_messages["ARC archive"] = "ARC-���i�";
$net2ftp_messages["ARJ archive"] = "ARJ-���i�";
$net2ftp_messages["ASP script"] = "������ ASP";
$net2ftp_messages["Action"] = "ĳ�";
$net2ftp_messages["Actions"] = "ĳ�";
$net2ftp_messages["Add another"] = "������ �����";
$net2ftp_messages["Admin functions"] = "������� �������������";
$net2ftp_messages["Adobe Acrobat document"] = "�������� Adobe Acrobat";
$net2ftp_messages["Advanced"] = "�����";
$net2ftp_messages["Advanced FTP functions"] = "�������� FTP �������";
$net2ftp_messages["Advanced functions"] = "��������� �������";
$net2ftp_messages["Advanced login"] = "Advanced login";
$net2ftp_messages["All"] = "��i";
$net2ftp_messages["All the selected directories and files have been processed."] = "��i ������i ����� �� ����� �����i���i.";
$net2ftp_messages["All the subdirectories and files of the selected directories will also be deleted!"] = "��i ������� �� ����� � ���������� ������ ����� ��������!";
$net2ftp_messages["Alternatively, use net2ftp's normal upload or upload-and-unzip functionality."] = "Alternatively, use net2ftp's normal upload or upload-and-unzip functionality.";
$net2ftp_messages["An error has occured"] = "������� �������";
$net2ftp_messages["Anonymous"] = "��������";
$net2ftp_messages["Archive <b>%1\$s</b> was not processed because its filename extension was not recognized. Only zip, tar, tgz and gz archives are supported at the moment."] = "����� <b>%1\$s</b> �� ��� ����������, ���� �� ���������� ����� �����������. ҳ���� z�p, tar, tgz �� gz ������ ������������.";
$net2ftp_messages["Archive contains filenames with ../ or ..\\ - aborting the extraction"] = "����� �� ������ ������ ../ or ..\\ - ��������������. ����������� ���������.";
$net2ftp_messages["Archives"] = "���i��";
$net2ftp_messages["Archives entered here will be decompressed, and the files inside will be transferred to the FTP server."] = "������ ������� ��� ������ ����������� �� ����� ������ ��������� �� FTP-������.";
$net2ftp_messages["Are you sure you want to delete these directories and files?"] = "�� ����� ������ �������� �� ����� �� �����?";
$net2ftp_messages["Ascending order"] = "��������";
$net2ftp_messages["Automatic"] = "������������";
$net2ftp_messages["Back"] = "�����";
$net2ftp_messages["Basic FTP login"] = "Basic FTP login";
$net2ftp_messages["Basic SSH login"] = "Basic SSH login";
$net2ftp_messages["Bitmap file"] = "����������";
$net2ftp_messages["Bookmark"] = "��������";
$net2ftp_messages["Calculate the size of the selected entries"] = "��������� ����� ����������";
$net2ftp_messages["Cascading Style Sheet"] = "CSS";
$net2ftp_messages["Case sensitive search"] = "³������ �� �������";
$net2ftp_messages["Changing the directory"] = "��i�� ��������i�";
$net2ftp_messages["Changing to the directory %1\$s: "] = "������� � ����� %1\$s: ";
$net2ftp_messages["Character encoding: "] = "��������� �������: ";
$net2ftp_messages["Check the SSH server's public key fingerprint"] = "Check the SSH server's public key fingerprint";
$net2ftp_messages["Checking files"] = "�����i��� ����i�";
$net2ftp_messages["Checking if the FTP module of PHP is installed: "] = "�����i��� ������������ ������ FTP �i� PHP: ";
$net2ftp_messages["Checking the permissions of the directory on the web server: a small file will be written to the /temp folder and then deleted."] = "�������� ������� ����� �� ���-������: ��������� ���� ���� ���� ��������� � ����� /temp �� ���� ���������.";
$net2ftp_messages["Chmod"] = "Chmod";
$net2ftp_messages["Chmod also the files within this directory"] = "Chmod ����� �� ����� ��������� ���� �����";
$net2ftp_messages["Chmod also the subdirectories within this directory"] = "Chmod ����� �� ������� ��������� ���� �����";
$net2ftp_messages["Chmod directories and files"] = "Chmod �� ����� �� �����";
$net2ftp_messages["Chmod the selected entries (only works on Unix/Linux/BSD servers)"] = "Chmod ��������� (�������� �� Unix/Linux/BSD ��������)";
$net2ftp_messages["Choose"] = "����";
$net2ftp_messages["Choose a directory"] = "�����i�� �����";
$net2ftp_messages["Click to sort by %1\$s in ascending order"] = "��������� ��� ���������� %1\$s � ������� ��������";
$net2ftp_messages["Click to sort by %1\$s in descending order"] = "��������� ��� ���������� %1\$s � ������� ���������";
$net2ftp_messages["Closing the file: "] = "�������� �����: ";
$net2ftp_messages["Connecting to a test FTP server: "] = "ϳ��������� �� ��������� FTP �������: ";
$net2ftp_messages["Connecting to the FTP server"] = "�'������� � FTP-��������";
$net2ftp_messages["Connecting to the FTP server: "] = "�'������� � FTP-��������: ";
$net2ftp_messages["Connection settings:"] = "��������� �'�������:";
$net2ftp_messages["Continue"] = "����������";
$net2ftp_messages["Copied file %1\$s"] = "����������� ���� %1\$s";
$net2ftp_messages["Copied file <b>%1\$s</b>"] = "Copied file <b>%1\$s</b>";
$net2ftp_messages["Copy"] = "����.";
$net2ftp_messages["Copy directories and files"] = "�������� ����� �� �����";
$net2ftp_messages["Copy directory <b>%1\$s</b> to:"] = "�������� ����� <b>%1\$s</b> �:";
$net2ftp_messages["Copy file <b>%1\$s</b> to:"] = "�������� ���� <b>%1\$s</b> �:";
$net2ftp_messages["Copy symlink <b>%1\$s</b> to:"] = "�������� ������� <b>%1\$s</b> �:";
$net2ftp_messages["Copy the selected entries"] = "�������� ������i �����";
$net2ftp_messages["Copying the net2ftp installer script to the FTP server"] = "���i������ ������������� ������� �� FTP ������";
$net2ftp_messages["Could not be saved"] = "Could not be saved";
$net2ftp_messages["Could not connect to SSH server"] = "Could not connect to SSH server";
$net2ftp_messages["Could not copy file %1\$s"] = "�� ������� ����i����� ���� %1\$s";
$net2ftp_messages["Could not create directory %1\$s"] = "�� ������� �������� ��������i� %1\$s";
$net2ftp_messages["Could not generate a temporary file."] = "�� ������� ����������� ���������� ����.";
$net2ftp_messages["Could not get fingerprint"] = "Could not get fingerprint";
$net2ftp_messages["Could not get public host key"] = "Could not get public host key";
$net2ftp_messages["Could not unzip entry %1\$s (error code %2\$s)"] = "Could not unzip entry %1\$s (error code %2\$s)";
$net2ftp_messages["Create a new file in directory %1\$s"] = "�������� ���� � ����� %1\$s";
$net2ftp_messages["Create a website easily using ready-made templates"] = "�������� ����  �������������� ����� �������";
$net2ftp_messages["Create new directories"] = "�������� ���i �����";
$net2ftp_messages["Create the MySQL database tables"] = "�������� ������� � ��� ����� MySQL";
$net2ftp_messages["Created directory %1\$s"] = "�������� ��������i� %1\$s";
$net2ftp_messages["Created target subdirectory <b>%1\$s</b>"] = "�������� �i������ <b>%1\$s</b>";
$net2ftp_messages["Creating a temporary directory on the FTP server"] = "��������� ��������� ��������i� �� FTP ������i";
$net2ftp_messages["Creating filename: "] = "��'� ����� ��� ���������: ";
$net2ftp_messages["Daily limit reached: the file <b>%1\$s</b> will not be transferred"] = "��������� ������� �i�i�: ���� <b>%1\$s</b> �� ���� ���������";
$net2ftp_messages["Daily limit reached: you will not be able to transfer data"] = "��������� ������� ���: �� �� ������ ����� ���������� ����";
$net2ftp_messages["Data transferred from this IP address today"] = "��'�� �����, ��������� � ���� �P ������ �� ��������";
$net2ftp_messages["Data transferred to this FTP server today"] = "��'�� ����� ��������� ����� FTP �������� ��������";
$net2ftp_messages["Date from:"] = "���� �:";
$net2ftp_messages["Dear,"] = "��������,";
$net2ftp_messages["Decompressing archives and transferring files"] = "������������ ���i�i� �� �����i����� ����i�";
$net2ftp_messages["Default"] = "�� �������������";
$net2ftp_messages["Delete"] = "��������";
$net2ftp_messages["Delete directories and files"] = "�������� ����� �� �����";
$net2ftp_messages["Delete the selected entries"] = "�������� ������i �����";
$net2ftp_messages["Deleted file <b>%1\$s</b>"] = "�������� ���� <b>%1\$s</b>";
$net2ftp_messages["Deleted subdirectory <b>%1\$s</b>"] = "�������� �i������ <b>%1\$s</b>";
$net2ftp_messages["Deleting the file: "] = "��������� �����: ";
$net2ftp_messages["Descending order"] = "���������";
$net2ftp_messages["Details"] = "�����i";
$net2ftp_messages["Different target FTP server:"] = "����� FTP-������:";
$net2ftp_messages["Directories"] = "�����";
$net2ftp_messages["Directories with names containing \' cannot be displayed correctly. They can only be deleted. Please go back and select another subdirectory."] = "����� � �������, �� ������ \' �� ������ �������� ������������. �� ����� ����� ��������. ���� �����, ����������� �� ������� ���� �����.";
$net2ftp_messages["Directory"] = "�����";
$net2ftp_messages["Directory <b>%1\$s</b>"] = "����� <b>%1\$s</b>";
$net2ftp_messages["Directory <b>%1\$s</b> could not be created."] = "��������i� <b>%1\$s</b> �� ���� ���� ��������.";
$net2ftp_messages["Directory <b>%1\$s</b> successfully chmodded to <b>%2\$s</b>"] = "����� <b>%1\$s</b> ���i��� chmodded <b>%2\$s</b>";
$net2ftp_messages["Directory <b>%1\$s</b> was successfully created."] = "����� <b>%1\$s</b> ���� ���i��� ��������.";
$net2ftp_messages["Directory Tree"] = "������ �����";
$net2ftp_messages["Disabled"] = "³��������";
$net2ftp_messages["Double-click to go to a subdirectory:"] = "��������� ���� ��� �������� � �������:";
$net2ftp_messages["Download"] = "����������� �� ����";
$net2ftp_messages["Download a zip file containing all selected entries"] = "����������� �� ���� zip-����, ��� ������ ������i �����";
$net2ftp_messages["Download the file %1\$s"] = "����������� �� ���� ����%1\$s";
$net2ftp_messages["Drag and drop one of the links below to the bookmarks bar"] = "Drag and drop one of the links below to the bookmarks bar";
$net2ftp_messages["Due to technical problems the email to <b>%1\$s</b> could not be sent."] = "� ��'���� � ���������� ���������� ema�l ��� <b>%1\$s</b> �� ���� ���� �����������.";
$net2ftp_messages["Edit"] = "������.";
$net2ftp_messages["Edit the source code of file %1\$s"] = "���������� �������� ��� ����� %1\$s";
$net2ftp_messages["Email the zip file in attachment to:"] = "Email zip-���� �����������:";
$net2ftp_messages["Empty logs"] = "�������� ����";
$net2ftp_messages["Enter the FTP server port (21 for FTP, 22 for FTP SSH or 990 for FTP SSL) - if you're not sure leave it to 21"] = "Enter the FTP server port (21 for FTP, 22 for FTP SSH or 990 for FTP SSL) - if you're not sure leave it to 21";
$net2ftp_messages["Enter your password"] = "Enter your password";
$net2ftp_messages["Enter your username"] = "Enter your username";
$net2ftp_messages["Entries which contain banned keywords can't be managed using net2ftp. This is to avoid Paypal or Ebay scams from being uploaded through net2ftp."] = "� ��������� net2ftp ��������� �������� �������, ��i �i����� ���������i �����. �� �����i��� ��� ������� �i� �i������ PayPal ��� Ebay.";
$net2ftp_messages["Example"] = "�������";
$net2ftp_messages["Executable"] = "�������";
$net2ftp_messages["Execute %1\$s in a new window"] = "�������� %1\$s � ������ �i��i";
$net2ftp_messages["FTP mode"] = "����� ������ FTP";
$net2ftp_messages["FTP server"] = "FTP-������";
$net2ftp_messages["FTP server port"] = "���� FTP-�������";
$net2ftp_messages["FTP server response:"] = "³������ FTP �������:";
$net2ftp_messages["File"] = "����";
$net2ftp_messages["File <b>%1\$s</b>"] = "���� <b>%1\$s</b>";
$net2ftp_messages["File <b>%1\$s</b> could not be moved"] = "���� <b>%1\$s</b> �� ���� ���� �����i�����";
$net2ftp_messages["File <b>%1\$s</b> could not be transferred to the FTP server"] = "���� <b>%1\$s</b> �� ���� ���� ������������ �� FTP-������";
$net2ftp_messages["File <b>%1\$s</b> has been transferred to the FTP server using FTP mode <b>%2\$s</b>"] = "���� <b>%1\$s</b> ��� ������������ �� FTP-������, �������������� FTP-����� <b>%2\$s</b>";
$net2ftp_messages["File <b>%1\$s</b> is OK"] = "���� <b>%1\$s</b> Ok";
$net2ftp_messages["File <b>%1\$s</b> is contains a banned keyword. This file will not be uploaded."] = "���� <b>%1\$s</b> �i����� ���������i �����. ���� �� ���� ������������.";
$net2ftp_messages["File <b>%1\$s</b> is too big. This file will not be uploaded."] = "���� <b>%1\$s</b> ������� �������. ���� �� ���� ������������.";
$net2ftp_messages["File <b>%1\$s</b> was successfully chmodded to <b>%2\$s</b>"] = "���� <b>%1\$s</b> ���i��� chmodded <b>%2\$s</b>";
$net2ftp_messages["File: "] = "����: ";
$net2ftp_messages["Files"] = "�����";
$net2ftp_messages["Files entered here will be transferred to the FTP server."] = "�����, ������� ��� ������ ��������� �� FTP-������.";
$net2ftp_messages["Files which are too big can't be downloaded, uploaded, copied, moved, searched, zipped, unzipped, viewed or edited; they can only be renamed, chmodded or deleted."] = "������� �����i ����� ������� �������������, ���i�����, �����i����, ���i������, �������������, ����������� ��� ����������; �� ����� ���������������, ��i������ ����� ������� ��� ��������.";
$net2ftp_messages["Find files which contain a particular word"] = "������ �����, �� ������ ������� �����";
$net2ftp_messages["Fingerprint"] = "Fingerprint";
$net2ftp_messages["Follow symlink %1\$s"] = "�������� symlink'� %1\$s";
$net2ftp_messages["Font file"] = "���� ������";
$net2ftp_messages["Forums"] = "������";
$net2ftp_messages["GIF file"] = "GIF";
$net2ftp_messages["GIMP file"] = "���� GIMP";
$net2ftp_messages["GZ archive"] = "GZ-���i�";
$net2ftp_messages["Get fingerprint"] = "Get fingerprint";
$net2ftp_messages["Get the SSH server's public key fingerprint before logging in to verify the server's identity"] = "Get the SSH server's public key fingerprint before logging in to verify the server's identity";
$net2ftp_messages["Getting archive %1\$s of %2\$s from the FTP server"] = "��������� ���i�� %1\$s of %2\$s � FTP �������";
$net2ftp_messages["Getting fingerprint, please wait..."] = "Getting fingerprint, please wait...";
$net2ftp_messages["Getting the FTP server system type: "] = "����������� ��� ������� FTP-�������: ";
$net2ftp_messages["Getting the FTP system type"] = "����������  ���� FTP �������";
$net2ftp_messages["Getting the current directory"] = "��i�� ������� ��������i�";
$net2ftp_messages["Getting the list of directories and files"] = "��������� ������ ����� �� ����i�";
$net2ftp_messages["Getting the raw list of directories and files: "] = "��������� ������ ����� �� ����i�: ";
$net2ftp_messages["Go"] = "������";
$net2ftp_messages["Go back"] = "�����";
$net2ftp_messages["Go to the advanced functions"] = "������� � ���. �������";
$net2ftp_messages["Go to the login page"] = "�� ����i��� �����";
$net2ftp_messages["Go to the parent directory"] = "������� �� ������� ����";
$net2ftp_messages["Go to the subdirectory %1\$s"] = "������� � ����������� %1\$s";
$net2ftp_messages["Group"] = "�����";
$net2ftp_messages["HTML file"] = "���� HTML";
$net2ftp_messages["HTML templates"] = "HTML templates";
$net2ftp_messages["Help"] = "��������";
$net2ftp_messages["Help Guide"] = "��������";
$net2ftp_messages["IP address: "] = "IP-������: ";
$net2ftp_messages["Icons"] = "������";
$net2ftp_messages["If the destination file already exists, it will be overwritten"] = "���� ���� ��� i���, �i� ���� �������������";
$net2ftp_messages["If you know nothing about this or if you don't trust that person, please delete this email without opening the Zip file in attachment."] = "���� �� �� �����, �� �� �� �����, ��� �� ���i����� �i����������i, ���� �����, �������� ��� ����, �� �i��������� �����.";
$net2ftp_messages["If you need unlimited usage, please install net2ftp on your own web server."] = "���� ��� ��������� ���������� �������, ���� ����� ��������� net2ftp �� ��� ������� ftp ������.";
$net2ftp_messages["If you really need net2ftp to be able to handle big tasks which take a long time, consider installing net2ftp on your own server."] = "���� �� ����� ������ �������� �� �������� ����� net2ftp, �� ��������� net2ftp �� �������� ������.";
$net2ftp_messages["If you want to copy the files to another FTP server, enter your login data."] = "���� �� ������ ������� ����� �� ������ FTP-������, �� ������ ���� ��� �����.";
$net2ftp_messages["Image"] = "����������";
$net2ftp_messages["In order to guarantee the fair use of the web server for everyone, the data transfer volume and script execution time are limited per user, and per day. Once this limit is reached, you can still browse the FTP server but not transfer data to/from it."] = "��� ����������� ���� ����������� ����� ������� ��� ������� �����������, ����������� ��������� �� ����� ��������� ����� �� ��� ��������� ������� ��� ����������� � ����. �� ����� ��� ��� �����������, �� ������ ����������� �����, ��� �� ������ ������������� �����.";
$net2ftp_messages["In order to run it, click on the link below."] = "��� ������� ��������� ��������� �����";
$net2ftp_messages["Information about the sender: "] = "I�������i� ��� �i���������: ";
$net2ftp_messages["Initial directory"] = "�����";
$net2ftp_messages["Install"] = "����������";
$net2ftp_messages["Install software packages"] = "���������� ������ ��";
$net2ftp_messages["Install software packages (requires PHP on web server)"] = "���������� ������ (������ �������� PHP �� ���-������i)";
$net2ftp_messages["JPEG file"] = "JPEG";
$net2ftp_messages["Java Upload"] = "����������� Java";
$net2ftp_messages["Java source file"] = "��� Java";
$net2ftp_messages["JavaScript file"] = "���� JavaScript";
$net2ftp_messages["Language:"] = "����:";
$net2ftp_messages["Leave empty if you want to copy the files to the same FTP server."] = "�������� ��������, ���� �� ������ ��������� ����� � �� � ����� FTP-�������.";
$net2ftp_messages["License"] = "˳�����";
$net2ftp_messages["Line"] = "�����";
$net2ftp_messages["List"] = "������";
$net2ftp_messages["List of commands:"] = "������ ������:";
$net2ftp_messages["Logging"] = "���������� ";
$net2ftp_messages["Logging into the FTP server"] = "��i� �� FTP-������";
$net2ftp_messages["Logging into the FTP server: "] = "��i� �� FTP-������: ";
$net2ftp_messages["Logging out of the FTP server"] = "���i� � FTP �������";
$net2ftp_messages["Login"] = "��i�";
$net2ftp_messages["Login!"] = "�����!";
$net2ftp_messages["Logout"] = "���i�";
$net2ftp_messages["MOV movie file"] = "�i��� MOV";
$net2ftp_messages["MPEG movie file"] = "�i��� MPEG";
$net2ftp_messages["MS Office - Access database"] = "MS Office - �� Access";
$net2ftp_messages["MS Office - Excel spreadsheet"] = "MS Office - ������� Excel";
$net2ftp_messages["MS Office - PowerPoint presentation"] = "MS Office - ���������i� PowerPoint";
$net2ftp_messages["MS Office - Project file"] = "MS Office - ���� �������";
$net2ftp_messages["MS Office - Visio drawing"] = "MS Office - ������� Visio";
$net2ftp_messages["MS Office - Word document"] = "MS Office - �������� Word";
$net2ftp_messages["Make a new subdirectory in directory %1\$s"] = "�������� ������� � ����� %1\$s";
$net2ftp_messages["Message of the sender: "] = "����������� ����������: ";
$net2ftp_messages["Mobile"] = "Mobile";
$net2ftp_messages["Mod Time"] = "���";
$net2ftp_messages["Move"] = "�������.";
$net2ftp_messages["Move directories and files"] = "���������� ����� �� �����";
$net2ftp_messages["Move directory <b>%1\$s</b> to:"] = "���������� ����� <b>%1\$s</b> �:";
$net2ftp_messages["Move file <b>%1\$s</b> to:"] = "���������� ���� <b>%1\$s</b> �:";
$net2ftp_messages["Move symlink <b>%1\$s</b> to:"] = "���������� ������� <b>%1\$s</b> �:";
$net2ftp_messages["Move the selected entries"] = "���������� ������i �����";
$net2ftp_messages["Moved directory <b>%1\$s</b>"] = "Moved directory <b>%1\$s</b>";
$net2ftp_messages["Moved file <b>%1\$s</b>"] = "�����i���� ���� <b>%1\$s</b>";
$net2ftp_messages["MySQL database"] = "���� ����� MySQL";
$net2ftp_messages["MySQL password"] = "������ MySQL";
$net2ftp_messages["MySQL password length"] = "������� ������ MySQL";
$net2ftp_messages["MySQL server"] = "MySQL server";
$net2ftp_messages["MySQL username"] = "��'� ����������� MySQL";
$net2ftp_messages["Name"] = "��'�";
$net2ftp_messages["New dir"] = "���� �����";
$net2ftp_messages["New directory name:"] = "���� i�'� �����:";
$net2ftp_messages["New file"] = "����� ����";
$net2ftp_messages["New file name: "] = "���� i�'� �����: ";
$net2ftp_messages["New name: "] = "���� i�'�: ";
$net2ftp_messages["No data"] = "���� �����";
$net2ftp_messages["Not yet saved"] = "Not yet saved";
$net2ftp_messages["Note that if you don't open the Zip file, the files inside cannot harm your computer."] = "���� �� �� ������ �i�������� zip-����, �����, �� ����������� � �����, ���� �� ������� ��������� ������ ����'������i.";
$net2ftp_messages["Note that sending files is not anonymous: your IP address as well as the time of the sending will be added to the email."] = "��������, ��� �������� ����i� �� ��������: ��� IP-������ ��� �� �� �� ����� ������������� ���� �������� � email.";
$net2ftp_messages["Note: other users of this computer could click on the browser's Back button and access the FTP server."] = "�����: ���� ����������� ����� ����'����� ������ ��������� �� ������ \"�����\" �� �������� ������ �� FTP �������.";
$net2ftp_messages["Note: the target directory must already exist before anything can be copied into it."] = "�������: ����� ������� ��� ��������.";
$net2ftp_messages["Note: when you will use this bookmark, a popup window will ask you for your username and password."] = "�������: ���� �� ������ ��������������� ��������, ��������� ���� ������ � ��� ��'� �� ������.";
$net2ftp_messages["OK"] = "OK";
$net2ftp_messages["OK. Filename: %1\$s"] = "OK. ��'� �����: %1\$s";
$net2ftp_messages["Old name: "] = "����� i�'�: ";
$net2ftp_messages["One click access (net2ftp won't ask for a password - less safe)"] = "One click access (net2ftp won't ask for a password - less safe)";
$net2ftp_messages["Open"] = "³������";
$net2ftp_messages["OpenOffice - Calc 6.0 spreadsheet"] = "OpenOffice - ������� Calc 6.0";
$net2ftp_messages["OpenOffice - Calc 6.0 template"] = "OpenOffice - ������ Calc 6.0";
$net2ftp_messages["OpenOffice - Draw 6.0 document"] = "OpenOffice - �������� Draw 6.0";
$net2ftp_messages["OpenOffice - Draw 6.0 template"] = "OpenOffice - ������ Draw 6.0";
$net2ftp_messages["OpenOffice - Impress 6.0 presentation"] = "OpenOffice - ���������i� Impress 6.0";
$net2ftp_messages["OpenOffice - Impress 6.0 template"] = "OpenOffice - ������ Impress 6.0";
$net2ftp_messages["OpenOffice - Math 6.0 document"] = "OpenOffice - �������� Math 6.0";
$net2ftp_messages["OpenOffice - Writer 6.0 document"] = "OpenOffice - �������� Writer 6.0";
$net2ftp_messages["OpenOffice - Writer 6.0 global document"] = "OpenOffice - �������� Writer 6.0";
$net2ftp_messages["OpenOffice - Writer 6.0 template"] = "OpenOffice - ������ Writer 6.0";
$net2ftp_messages["Opening the file in write mode: "] = "³������� ����� � ����� ��� ������: ";
$net2ftp_messages["Owner"] = "����������";
$net2ftp_messages["PHP Source"] = "PHP ���";
$net2ftp_messages["PHP script"] = "������ PHP";
$net2ftp_messages["PNG file"] = "PNG";
$net2ftp_messages["Parsing the file"] = "����������� �����";
$net2ftp_messages["Parsing the list of directories and files"] = "������� ������ ����i� �� ��������i�";
$net2ftp_messages["Passive mode"] = "�������� �����";
$net2ftp_messages["Password"] = "������";
$net2ftp_messages["Password length"] = "������� ������";
$net2ftp_messages["Perms"] = "�������";
$net2ftp_messages["Please enter a password."] = "Please enter a password.";
$net2ftp_messages["Please enter a username."] = "Please enter a username.";
$net2ftp_messages["Please enter a valid date in Y-m-d format in the \"from\" textbox."] = "���� �����, ����i�� ��������� ���� � ������i �-�-� � ���� \"��\".";
$net2ftp_messages["Please enter a valid date in Y-m-d format in the \"to\" textbox."] = "���� �����, ����i�� ��������� ���� � ������i �-�-� � ���� \"�\".";
$net2ftp_messages["Please enter a valid file size in the \"from\" textbox, for example 0."] = "���� �����, ����i�� ��������� ����� � ���� \"��\", ���������, 0.";
$net2ftp_messages["Please enter a valid file size in the \"to\" textbox, for example 500000."] = "���� �����, ����i�� ���������� ����� � ���� \"�\", ���������, 500000.";
$net2ftp_messages["Please enter a valid filename."] = "������ ��������� i�'� �����.";
$net2ftp_messages["Please enter a valid search word or phrase."] = "������ ��������� ����� ��� �����.";
$net2ftp_messages["Please enter an FTP server."] = "Please enter an FTP server.";
$net2ftp_messages["Please enter your Administrator username and password."] = "���� �����, ����i�� ���i� �� ������ �������������.";
$net2ftp_messages["Please enter your MySQL settings:"] = "���� �����, ������ ��������� ������ � MySQL:";
$net2ftp_messages["Please enter your username and password for FTP server <b>%1\$s</b>."] = "���� �����, ����i�� ���i� �� ������ �� FTP ������� <b>%1\$s</b>.";
$net2ftp_messages["Please specify a filename"] = "������ i�'� �����";
$net2ftp_messages["Please wait..."] = "���� �����, ���������...";
$net2ftp_messages["Powered by"] = "�������� ��";
$net2ftp_messages["Printing the list of directories and files"] = "���i� ������ ����� �� ����i�";
$net2ftp_messages["Printing the result"] = "Printing the result";
$net2ftp_messages["Processing archive nr %1\$s: <b>%2\$s</b>"] = "�����i��� ���i�� nr %1\$s: <b>%2\$s</b>";
$net2ftp_messages["Processing directory <b>%1\$s</b>"] = "�����i��� ����� <b>%1\$s</b>";
$net2ftp_messages["Processing entries within directory <b>%1\$s</b>:"] = "������� ����i� ��������i� <b>%1\$s</b>:";
$net2ftp_messages["Processing entry %1\$s"] = "������� ������ %1\$s";
$net2ftp_messages["Processing of directory <b>%1\$s</b> completed"] = "�����i��� ����� <b>%1\$s</b> ���i�����";
$net2ftp_messages["Processing the entries"] = "������� ��i���";
$net2ftp_messages["Protocol"] = "Protocol";
$net2ftp_messages["Quicktime movie file"] = "�i��� Quicktime";
$net2ftp_messages["RPM"] = "RPM";
$net2ftp_messages["Reading the file"] = "������� �����";
$net2ftp_messages["Real movie file"] = "�i��� � ������i Real";
$net2ftp_messages["Refresh"] = "�������";
$net2ftp_messages["Rename"] = "������.";
$net2ftp_messages["Rename directories and files"] = "������������� ����� �� �����";
$net2ftp_messages["Rename the selected entries"] = "������������� ���������";
$net2ftp_messages["Requested files"] = "�������i �����";
$net2ftp_messages["Restrict the search to:"] = "���������� �����:";
$net2ftp_messages["Restrictions:"] = "���������:";
$net2ftp_messages["Results:"] = "����������:";
$net2ftp_messages["Right-click on one of the links below and choose \"Add to Favorites...\""] = "Right-click on one of the links below and choose \"Add to Favorites...\"";
$net2ftp_messages["Right-click on one of the links below and choose \"Bookmark This Link...\""] = "Right-click on one of the links below and choose \"Bookmark This Link...\"";
$net2ftp_messages["Right-click on one of the links below and choose \"Bookmark link...\""] = "Right-click on one of the links below and choose \"Bookmark link...\"";
$net2ftp_messages["Right-click on one the links below and choose \"Add Link to Bookmarks...\""] = "Right-click on one the links below and choose \"Add Link to Bookmarks...\"";
$net2ftp_messages["SSH fingerprint"] = "SSH fingerprint";
$net2ftp_messages["SSH server"] = "SSH server";
$net2ftp_messages["Save"] = "��������";
$net2ftp_messages["Save the zip file on the FTP server as:"] = "�������� zip-���� �� FTP-������i ��:";
$net2ftp_messages["Saved at %1\$s"] = "Saved at %1\$s";
$net2ftp_messages["Script finished in %1\$s seconds"] = "������ ��������� �� %1\$s ������";
$net2ftp_messages["Script halted"] = "������ ����������";
$net2ftp_messages["Search"] = "�����";
$net2ftp_messages["Search directories and files"] = "����� ����� �� ����i�";
$net2ftp_messages["Search for a word or phrase"] = "����� ����� ��� �����";
$net2ftp_messages["Search results"] = "���������� ������";
$net2ftp_messages["Searching the files..."] = "����� �����...";
$net2ftp_messages["Select the directory %1\$s"] = "������� ��������i� %1\$s";
$net2ftp_messages["Select the file %1\$s"] = "������� ���� %1\$s";
$net2ftp_messages["Select the symlink %1\$s"] = "������� symlink %1\$s";
$net2ftp_messages["Send arbitrary FTP commands"] = "�i���������� ��������� FTP �������";
$net2ftp_messages["Send arbitrary FTP commands to the FTP server"] = "³�������� ������� FTP ������� �� FTP ������";
$net2ftp_messages["Sending FTP command %1\$s of %2\$s"] = "�i���������� FTP ������� %1\$s of %2\$s";
$net2ftp_messages["Sent via the net2ftp application installed on this website: "] = "�i��������� ����� net2ftp � ����� ";
$net2ftp_messages["Set all permissions"] = "������ �� �����";
$net2ftp_messages["Set all targetdirectories"] = "������� �� �����";
$net2ftp_messages["Set the permissions of directory <b>%1\$s</b> to: "] = "������� ������� ��� ����� <b>%1\$s</b>: ";
$net2ftp_messages["Set the permissions of file <b>%1\$s</b> to: "] = "������� ������� ��� ����� <b>%1\$s</b>: ";
$net2ftp_messages["Set the permissions of symlink <b>%1\$s</b> to: "] = "������� ������� ��� ������ <b>%1\$s</b>: ";
$net2ftp_messages["Setting the passive mode"] = "������������ ���������� ������";
$net2ftp_messages["Setting the passive mode: "] = "������� �� �������� �����: ";
$net2ftp_messages["Setting the permissions of the temporary directory"] = "������������ ���� �� ��������� ��������i�";
$net2ftp_messages["settings used:"] = "��������������� ������������:";
$net2ftp_messages["Setup MySQL tables"] = "����������� ������� MySQL";
$net2ftp_messages["Shell script"] = "������ shell";
$net2ftp_messages["Shockwave file"] = "���� Shockwave";
$net2ftp_messages["Shockwave flash file"] = "����Shockwave flash";
$net2ftp_messages["Should this link not be correct, enter the URL manually in your web browser."] = "Should this link not be correct, enter the URL manually in your web browser.";
$net2ftp_messages["Size"] = "�����";
$net2ftp_messages["Size of selected directories and files"] = "����� �������� ����� �� ����i�";
$net2ftp_messages["Skin:"] = "����:";
$net2ftp_messages["Some additional comments to add in the email:"] = "��������i �� email:";
$net2ftp_messages["Someone has requested the files in attachment to be sent to this email account (%1\$s)."] = "����� (������� ��) �i������� �����, ���������i �� ������i, �� �� ������ (%1\$s).";
$net2ftp_messages["Standard"] = "Standard";
$net2ftp_messages["StarOffice - StarCalc 5.x spreadsheet"] = "StarOffice - ������� StarCalc 5.x";
$net2ftp_messages["StarOffice - StarChart 5.x document"] = "StarOffice - �������� StarChart 5.x";
$net2ftp_messages["StarOffice - StarDraw 5.x document"] = "StarOffice - �������� StarDraw 5.x";
$net2ftp_messages["StarOffice - StarImpress 5.x presentation"] = "StarOffice - ���������i� StarImpress 5.x";
$net2ftp_messages["StarOffice - StarImpress Packed 5.x file"] = "StarOffice - ���� StarImpress Packed 5.x";
$net2ftp_messages["StarOffice - Starmail 5.x mail file"] = "StarOffice - ���� ����� Starmail 5.x";
$net2ftp_messages["StarOffice - StarMath 5.x document"] = "StarOffice - �������� StarMath 5.x";
$net2ftp_messages["StarOffice - StarWriter 5.x document"] = "StarOffice - �������� StarWriter 5.x";
$net2ftp_messages["StarOffice - StarWriter 5.x global document"] = "StarOffice - �������� StarWriter 5.x";
$net2ftp_messages["Status: <b>This file could not be saved</b>"] = "����: <b>��� ���� �� ���� ���� ����������</b>";
$net2ftp_messages["Status: Saved on <b>%1\$s</b> using mode %2\$s"] = "����: ��������� � <b>%1\$s</b> � ����� %2\$s";
$net2ftp_messages["Status: This file has not yet been saved"] = "����: ���� �� ����������";
$net2ftp_messages["Submit"] = "�i��������";
$net2ftp_messages["Symlink"] = "���������";
$net2ftp_messages["Symlink <b>%1\$s</b>"] = "ѳ���� <b>%1\$s</b>";
$net2ftp_messages["Symlinks"] = "���������";
$net2ftp_messages["Syntax highlighting powered by <a href=\"http://luminous.asgaard.co.uk\">Luminous</a>"] = "ϳ���������� ���������� ���������� <a href=\"http://luminous.asgaard.co.uk\">Luminous</a>";
$net2ftp_messages["TAR archive"] = "TAR-���i�";
$net2ftp_messages["TIF file"] = "TIF";
$net2ftp_messages["Table net2ftp_log_access contains duplicate entries."] = "������� net2ftp_log_access �i����� �������i ������.";
$net2ftp_messages["Table net2ftp_log_access could not be updated."] = "�� ������� ������� ������� net2ftp_log_access.";
$net2ftp_messages["Table net2ftp_log_consumption_ftpserver contains duplicate entries."] = "Table net2ftp_log_consumption_ftpserver contains duplicate entries.";
$net2ftp_messages["Table net2ftp_log_consumption_ftpserver contains duplicate rows."] = "������� net2ftp_log_consumption_ftpserver �i����� �������i ������.";
$net2ftp_messages["Table net2ftp_log_consumption_ftpserver could not be updated."] = "�� ������� ������� ������� net2ftp_log_consumption_ftpserver.";
$net2ftp_messages["Table net2ftp_log_consumption_ipaddress contains duplicate entries."] = "������� net2ftp_log_consumption_ipaddress �i����� �������i ������.";
$net2ftp_messages["Table net2ftp_log_consumption_ipaddress contains duplicate rows."] = "������� net2ftp_log_consumption_ipaddress �i����� �������i ������.";
$net2ftp_messages["Table net2ftp_log_consumption_ipaddress could not be updated."] = "�� ������� ������� ������� net2ftp_log_consumption_ipaddress.";
$net2ftp_messages["Table net2ftp_log_status contains duplicate entries."] = "Table net2ftp_log_status contains duplicate entries.";
$net2ftp_messages["Table net2ftp_log_status could not be updated."] = "Table net2ftp_log_status could not be updated.";
$net2ftp_messages["Table net2ftp_users contains duplicate rows."] = "������� net2ftp_users �i����� �������i ������.";
$net2ftp_messages["Target directory:"] = "����� �����������:";
$net2ftp_messages["Target name:"] = "��'� �����������:";
$net2ftp_messages["Test the net2ftp list parsing rules"] = "��������� ������� ������� ������ net2ftp";
$net2ftp_messages["Testing the FTP functions"] = "���������� ������� FTP";
$net2ftp_messages["Text file"] = "�����";
$net2ftp_messages["The <a href=\"http://www.php.net/manual/en/ref.ftp.php\" target=\"_blank\">FTP module of PHP</a> is not installed.<br /><br /> The administrator of this website should install this FTP module. Installation instructions are given on <a href=\"http://www.php.net/manual/en/ref.ftp.php\" target=\"_blank\">php.net</a>.<br />"] = "The <a href=\"http://www.php.net/manual/en/ref.ftp.php\" target=\"_blank\">FTP module of PHP</a> is not installed.<br /><br /> The administrator of this website should install this FTP module. Installation instructions are given on <a href=\"http://www.php.net/manual/en/ref.ftp.php\" target=\"_blank\">php.net</a>.<br />";
$net2ftp_messages["The FTP module of PHP and/or OpenSSL are not installed.<br /><br /> The administrator of this website should install these. Installation instructions are given on php.net: <a href=\"http://www.php.net/manual/en/ref.ftp.php\" target=\"_blank\">FTP module installation</a> and <a href=\"http://php.net/manual/en/openssl.installation.php\">OpenSSL installation</a>.<br />"] = "The FTP module of PHP and/or OpenSSL are not installed.<br /><br /> The administrator of this website should install these. Installation instructions are given on php.net: <a href=\"http://www.php.net/manual/en/ref.ftp.php\" target=\"_blank\">FTP module installation</a> and <a href=\"http://php.net/manual/en/openssl.installation.php\">OpenSSL installation</a>.<br />";
$net2ftp_messages["The FTP server <b>%1\$s</b> is in the list of banned FTP servers."] = "FTP-������ <b>%1\$s</b> ����������� � ������ ����������� FTP-������i�.";
$net2ftp_messages["The FTP server <b>%1\$s</b> is not in the list of allowed FTP servers."] = "FTP-������ <b>%1\$s</b> �� ��������� � ������ ���������� FTP-������i�.";
$net2ftp_messages["The FTP server port %1\$s may not be used."] = "���� FTP-������� %1\$s �� ���� �����������������.";
$net2ftp_messages["The FTP transfer mode (ASCII or BINARY) will be automatically determined, based on the filename extension"] = "����� �������� FTP (ASC�� ��� B�NARY) ���� ����������� ����������, ���������� �� ����������";
$net2ftp_messages["The SQL query nr <b>%1\$s</b> could not be executed."] = "SQL-����� <b>%1\$s</b> �� ���� ���� ���������.";
$net2ftp_messages["The SQL query nr <b>%1\$s</b> was executed successfully."] = "SQL-����� <b>%1\$s</b> ��� ���i��� ���������.";
$net2ftp_messages["The SSH server's fingerprint does not match the fingerprint which was validated previously.<br /><br />Current fingerprint: %1\$s <br />Fingerprint validated previously: %2\$s <br /><br />"] = "The SSH server's fingerprint does not match the fingerprint which was validated previously.<br /><br />Current fingerprint: %1\$s <br />Fingerprint validated previously: %2\$s <br /><br />";
$net2ftp_messages["The chmod nr <b>%1\$s</b> is out of the range 000-777. Please try again."] = "Chmod <b>%1\$s</b> �������� � �������� 000-777. ��������� �� ���.";
$net2ftp_messages["The directory <b>%1\$s</b> contains a banned keyword, aborting the move"] = "��������i� <b>%1\$s</b> �i����� ���������� �����, �����i����� �� ���� ��������";
$net2ftp_messages["The directory <b>%1\$s</b> contains a banned keyword, so this directory will be skipped"] = "��������i� <b>%1\$s</b> �i����� ���������� �����, ���� ��������i� ����� ���������";
$net2ftp_messages["The directory <b>%1\$s</b> could not be selected - you may not have sufficient rights to view this directory, or it may not exist."] = "��������i� <b>%1\$s</b> �� ���� ���� ������� - � ��� ���� ���� ����������� ���� ��� ��������� ��� ��������i� �� i���.";
$net2ftp_messages["The directory <b>%1\$s</b> could not be selected, so this directory will be skipped"] = "��������i� <b>%1\$s</b> �� ���� ���� �������, ������ ���� ���� ���������";
$net2ftp_messages["The directory <b>%1\$s</b> does not exist or could not be selected, so the directory <b>%2\$s</b> is shown instead."] = "��������i� <b>%1\$s</b> �� i��� ��� �� ���� ���� ��������, ������ ������� ��������i� <b>%2\$s</b> .";
$net2ftp_messages["The email address you have entered (%1\$s) does not seem to be valid.<br />Please enter an address in the format <b>username@domain.com</b>"] = "Email ������, ��� �� ����� (%1\$s) �����������.<br />���� �����, ����i�� ������ � ������i <b>i�'�_����������@�����.u�</b>";
$net2ftp_messages["The file %1\$s could not be opened."] = "���� %1\$s �� ���� ���� ��������.";
$net2ftp_messages["The file <b>%1\$s</b> contains a banned keyword, aborting the move"] = "���� <b>%1\$s</b> �i����� ���������i �����, ���� �� ���� �����i�����";
$net2ftp_messages["The file <b>%1\$s</b> contains a banned keyword, so this file will be skipped"] = "���� <b>%1\$s</b> �i����� ���������i �����, ���� ���� ���� ����������";
$net2ftp_messages["The file <b>%1\$s</b> is too big to be copied, so this file will be skipped"] = "���� <b>%1\$s</b> ������� ������� ��� ���i������, ���� �i� ���� ����������";
$net2ftp_messages["The file <b>%1\$s</b> is too big to be moved, aborting the move"] = "���� <b>%1\$s</b> ������� ������� ��� �����i�����, �����i����� �� ���� ��������";
$net2ftp_messages["The file is too big to be transferred"] = "���� ������� ������� ��� �������i.";
$net2ftp_messages["The handle of file %1\$s could not be closed."] = "�� ������� ������� �������� �� ���� %1\$s";
$net2ftp_messages["The handle of file %1\$s could not be opened."] = "�� ������� �i������ �������� ��� ����� %1\$s";
$net2ftp_messages["The latest version information could not be retrieved from the net2ftp.com server. Check the security settings of your browser, which may prevent the loading of a small file from the net2ftp.com server."] = "�� ������� �������� ���������� ��� ������� ����� � ����� net2ftp.com. �����i��� ������������ ������� ������ ��������, �� ������ ������������ ������������ ���������� ����� � net2ftp.com.";
$net2ftp_messages["The log tables could not be copied."] = "The log tables could not be copied.";
$net2ftp_messages["The log tables could not be renamed."] = "The log tables could not be renamed.";
$net2ftp_messages["The log tables were copied successfully."] = "The log tables were copied successfully.";
$net2ftp_messages["The log tables were renamed successfully."] = "The log tables were renamed successfully.";
$net2ftp_messages["The maximum execution time is <b>%1\$s seconds</b>"] = "������������ ��� ��������� <b>%1\$s ������</b>";
$net2ftp_messages["The maximum size of one file is restricted by net2ftp to <b>%1\$s</b> and by PHP to <b>%2\$s</b>"] = "������������ ����� ������ ����� ��������� net2ftp �� <b>%1\$s</b> �� PHP �� <b>%2\$s</b>";
$net2ftp_messages["The net2ftp installer script has been copied to the FTP server."] = "������ ������������ net2ftp ��� ����������� �� FTP ������.";
$net2ftp_messages["The new directories will be created in <b>%1\$s</b>."] = "��� ����� ����� �������� � <b>%1\$s</b>.";
$net2ftp_messages["The new name may not contain any banned keywords. This entry was not renamed to <b>%1\$s</b>"] = "��'� �� ���� ������ ���������� �����. ���� �� ��� �������������� � <b>%1\$s</b>";
$net2ftp_messages["The new name may not contain any dots. This entry was not renamed to <b>%1\$s</b>"] = "��'� �� ���� ������ ������. �� ���� ������������� � <b>%1\$s</b>";
$net2ftp_messages["The number of files which were skipped is:"] = "ʳ������ ����i�, �� ���� ���������:";
$net2ftp_messages["The oldest log table could not be dropped."] = "The oldest log table could not be dropped.";
$net2ftp_messages["The oldest log table was dropped successfully."] = "The oldest log table was dropped successfully.";
$net2ftp_messages["The online installation is about 1-2 MB and the offline installation is about 13 MB. This 'end-user' java is called JRE (Java Runtime Environment)."] = "The online installation is about 1-2 MB and the offline installation is about 13 MB. This 'end-user' java is called JRE (Java Runtime Environment).";
$net2ftp_messages["The table <b>%1\$s</b> could not be emptied."] = "������� <b>%1\$s</b> �� ���� ���� �������.";
$net2ftp_messages["The table <b>%1\$s</b> could not be optimized."] = "������� <b>%1\$s</b> �� ���� ���� �����������.";
$net2ftp_messages["The table <b>%1\$s</b> was emptied successfully."] = "������� <b>%1\$s</b> ���i��� �������.";
$net2ftp_messages["The table <b>%1\$s</b> was optimized successfully."] = "������� <b>%1\$s</b> ���i��� �����������.";
$net2ftp_messages["The target directory <b>%1\$s</b> is the same as or a subdirectory of the source directory <b>%2\$s</b>, so this directory will be skipped"] = "����� ����������� <b>%1\$s</b> ��i����� � �i������� <b>%2\$s</b>, ���� ���� ���� ���������";
$net2ftp_messages["The target for file <b>%1\$s</b> is the same as the source, so this file will be skipped"] = "���� ����������� <b>%1\$s</b> ��i����� � ���i���� ������, �i� ���� ����������";
$net2ftp_messages["The task you wanted to perform with net2ftp took more time than the allowed %1\$s seconds, and therefor that task was stopped."] = "��������, �� �� ����� ��������� ����� net2ftp ����� ����� %1\$s ���������� ������. ��������� ��������.";
$net2ftp_messages["The total size taken by the selected directories and files is:"] = "��������� ����� ����i� �� �����:";
$net2ftp_messages["The variable <b>consumption_ipaddress_datatransfer</b> is not numeric."] = "��i��� <b>consumption_ipaddress_datatransfer</b> �� ��������� ������.";
$net2ftp_messages["The word <b>%1\$s</b> was found in the following files:"] = "����� <b>%1\$s</b> ���� �������� � ��������� ������:";
$net2ftp_messages["The word <b>%1\$s</b> was not found in the selected directories and files."] = "����� <b>%1\$s</b> �� ���� ��������.";
$net2ftp_messages["The zip file has been saved on the FTP server as <b>%1\$s</b>"] = "Zip-���� ���������� �� FTP-������i �� <b>%1\$s</b>";
$net2ftp_messages["The zip file has been sent to <b>%1\$s</b>."] = "Zip-���� ����������� <b>%1\$s</b>.";
$net2ftp_messages["This SQL query is going to be executed:"] = "���� ��������� ��������� SQL-�����:";
$net2ftp_messages["This file is not accessible from the web"] = "��� ���� �� ��������� � web-����������";
$net2ftp_messages["This folder is empty"] = "����� �����";
$net2ftp_messages["This function has been disabled by the Administrator of this website."] = "������ �����i� �i�������� ���i�i���������.";
$net2ftp_messages["This function is available on PHP 5 only"] = "�� �����i� �������� �i���� � PHP 5";
$net2ftp_messages["This script runs on your web server and requires PHP to be installed."] = "��� ������ ���������� �� ������ ������ �� ������ �������� PHP.";
$net2ftp_messages["This time limit guarantees the fair use of the web server for everyone."] = "�� ��������� ���� �������� ������������� �������� ��� �������.";
$net2ftp_messages["This version of net2ftp is up-to-date."] = "� ��� ����������� ������� ����� net2ftp.";
$net2ftp_messages["Time of sending: "] = "��� �i����������: ";
$net2ftp_messages["To prevent this, you must close all browser windows."] = "��� �������� �����, �������� �� ���� ��������.";
$net2ftp_messages["To save the image, right-click on it and choose 'Save picture as...'"] = "��� ���������� ��������� ����� ������ ���� �� ������� 'Save picture as...'";
$net2ftp_messages["To set a common target directory, enter that target directory in the textbox above and click on the button \"Set all targetdirectories\"."] = "��� ������ ������� �����, ������ �� ����� � ���� ���� �� ������� ����� \"������� �� �����\".";
$net2ftp_messages["To set all permissions to the same values, enter those permissions above and click on the button \"Set all permissions\""] = "To set all permissions to the same values, enter those permissions above and click on the button \"Set all permissions\"";
$net2ftp_messages["To set all permissions to the same values, enter those permissions and click on the button \"Set all permissions\""] = "��� ������ ��������� �������, ������ ���� �������� ����� �� ��������� �� ������ \"������� �������\"";
$net2ftp_messages["To use this applet, please install the newest version of Sun's java. You can get it from <a href=\"http://www.java.com/\">java.com</a>. Click on Get It Now."] = "To use this applet, please install the newest version of Sun's java. You can get it from <a href=\"http://www.java.com/\">java.com</a>. Click on Get It Now.";
$net2ftp_messages["Transferring files to the FTP server"] = "�����i����� ����i� �� FTP-������";
$net2ftp_messages["Transform selected entries: "] = "����������� ���������: ";
$net2ftp_messages["Transform selected entry: "] = "����������� ���������: ";
$net2ftp_messages["Troubleshoot an FTP server"] = "�������� ������� FTP-�������";
$net2ftp_messages["Troubleshoot net2ftp on this webserver"] = "�������� ������� net2ftp �� ����� ���-������i";
$net2ftp_messages["Troubleshoot your net2ftp installation"] = "�������� ������� ������������ net2ftp";
$net2ftp_messages["Troubleshooting functions"] = "������� ��� �������� �������";
$net2ftp_messages["Try to split your task in smaller tasks: restrict your selection of files, and omit the biggest files."] = "��������� �������� ��������: ���������, ���������� ���� ������� �����.";
$net2ftp_messages["Two click access (net2ftp will ask for a password - safer)"] = "Two click access (net2ftp will ask for a password - safer)";
$net2ftp_messages["Type"] = "���";
$net2ftp_messages["Unable to close the handle of the temporary file"] = "�� ������� ������� ���������� ����";
$net2ftp_messages["Unable to connect to FTP server <b>%1\$s</b> on port <b>%2\$s</b>.<br /><br />Are you sure this is the address of the FTP server? This is often different from that of the HTTP (web) server. Please contact your ISP helpdesk or system administrator for help.<br />"] = "�� ������� �'�������� � FTP-�������� <b>%1\$s</b> �� ����� <b>%2\$s</b>.<br /><br />�� ��������� ������ FTP-�������? ���� ����� �i��i�������� �i� ������ HTTP-�������. ���� �����, ��'��i���� � ����i�������� ������ ISP ��� ������i���.<br />";
$net2ftp_messages["Unable to connect to SSH server <b>%1\$s</b> on port <b>%2\$s</b> (%3\$s).<br /><br />Are you sure this is the address of the FTP server? This is often different from that of the HTTP (web) server. Please contact your ISP helpdesk or system administrator for help.<br />"] = "Unable to connect to SSH server <b>%1\$s</b> on port <b>%2\$s</b> (%3\$s).<br /><br />Are you sure this is the address of the FTP server? This is often different from that of the HTTP (web) server. Please contact your ISP helpdesk or system administrator for help.<br />";
$net2ftp_messages["Unable to connect to the MySQL database. Please check your MySQL database settings in net2ftp's configuration file settings.inc.php."] = "��������� �'�������� � �������� MySQL. �����i��� ��������� �i��������� � ����i settings.inc.php.";
$net2ftp_messages["Unable to connect to the server <b>%1\$s</b>."] = "Unable to connect to the server <b>%1\$s</b>.";
$net2ftp_messages["Unable to copy the file <b>%1\$s</b>"] = "�� ������� ����i����� ���� <b>%1\$s</b>";
$net2ftp_messages["Unable to copy the local file to the remote file <b>%1\$s</b> using FTP mode <b>%2\$s</b>"] = "�� ������� ����i����� ��������� ���� <b>%1\$s</b> �� ��������� ����'����, �������������� ����� <b>%2\$s</b>";
$net2ftp_messages["Unable to copy the remote file <b>%1\$s</b> to the local file using FTP mode <b>%2\$s</b>"] = "�� ������� ����i����� ��������� ���� <b>%1\$s</b> �� ��������� ����'����, �������������� FTP-ht;bv <b>%2\$s</b>";
$net2ftp_messages["Unable to create a temporary directory (too many tries)"] = "Unable to create a temporary directory (too many tries)";
$net2ftp_messages["Unable to create a temporary directory because (parent directory is not writeable)"] = "Unable to create a temporary directory because (parent directory is not writeable)";
$net2ftp_messages["Unable to create a temporary directory because (unvalid parent directory)"] = "Unable to create a temporary directory because (unvalid parent directory)";
$net2ftp_messages["Unable to create the directory <b>%1\$s</b>"] = "�� ������� �������� ����� <b>%1\$s</b>";
$net2ftp_messages["Unable to create the subdirectory <b>%1\$s</b>. It may already exist. Continuing the copy/move process..."] = "�� ������� �������� ������� <b>%1\$s</b>. ���� ��� i���. ����������� �������...";
$net2ftp_messages["Unable to create the temporary file. Check the permissions of the %1\$s directory."] = "�� ������� �������� ���������� ����. �����i��� ������� ����� %1\$s.";
$net2ftp_messages["Unable to delete file <b>%1\$s</b>"] = "�� ������� �������� ���� <b>%1\$s</b>";
$net2ftp_messages["Unable to delete the directory <b>%1\$s</b>"] = "�� ������� �������� ����� <b>%1\$s</b>";
$net2ftp_messages["Unable to delete the file <b>%1\$s</b>"] = "�� ������� �������� ���� <b>%1\$s</b>";
$net2ftp_messages["Unable to delete the local file"] = "�� ������� �������� ��������� ����";
$net2ftp_messages["Unable to delete the subdirectory <b>%1\$s</b> - it may not be empty"] = "�� ������� �������� ������� <b>%1\$s</b> - ���� �� �����";
$net2ftp_messages["Unable to delete the temporary directory"] = "�� ������� �������� ��������� ��������i�";
$net2ftp_messages["Unable to delete the temporary file"] = "�� ������� �������� ���������� ����";
$net2ftp_messages["Unable to delete the temporary file %1\$s"] = "�� ������� �������� ���������� ���� %1\$s";
$net2ftp_messages["Unable to determine your IP address."] = "�� ������� ����i����� ���� ip ������.";
$net2ftp_messages["Unable to execute site command <b>%1\$s</b>"] = "�� ������� �������� ������� <b>%1\$s</b>";
$net2ftp_messages["Unable to execute site command <b>%1\$s</b>. Note that the CHMOD command is only available on Unix FTP servers, not on Windows FTP servers."] = "�� ������� �������� ������� <b>%1\$s</b>. ������� CHMOD �������� �i���� �� Unix-��������.";
$net2ftp_messages["Unable to execute the SQL query <b>%1\$s</b>."] = "�� ������� �������� SQL ����� <b>%1\$s</b>.";
$net2ftp_messages["Unable to execute the SQL query."] = "�� ������� �������� SQL �����.";
$net2ftp_messages["Unable to extract the files and directories from the archive"] = "�� ������� ������� ����� �� ���i��";
$net2ftp_messages["Unable to get the archive <b>%1\$s</b> from the FTP server"] = "�� ������� �������� ���i� <b>%1\$s</b> � FTP �������";
$net2ftp_messages["Unable to get the file <b>%1\$s</b> from the FTP server and to save it as temporary file <b>%2\$s</b>.<br />Check the permissions of the %3\$s directory.<br />"] = "�� ������� ����������� ���� <b>%1\$s</b> � FTP-������� �� �������� ���� �� ���������� ���� <b>%2\$s</b>.<br />�����i��� ������� ����� %3\$s.<br />";
$net2ftp_messages["Unable to get the list of packages"] = "�� ������� �������� ������ ������";
$net2ftp_messages["Unable to login to FTP server <b>%1\$s</b> with username <b>%2\$s</b>.<br /><br />Are you sure your username and password are correct? Please contact your ISP helpdesk or system administrator for help.<br />"] = "�� ������� ��i��� �� FTP-������ <b>%1\$s</b> � ���i��� <b>%2\$s</b>.<br /><br />��������i ���i� �� ������? ���� �����, ��'��i���� � ����i�������� ������ ISP ��� ������i���.<br />";
$net2ftp_messages["Unable to login to SSH server <b>%1\$s</b> with username <b>%2\$s</b> (%3\$s).<br /><br />Are you sure your username and password are correct? Please contact your ISP helpdesk or system administrator for help.<br />"] = "Unable to login to SSH server <b>%1\$s</b> with username <b>%2\$s</b> (%3\$s).<br /><br />Are you sure your username and password are correct? Please contact your ISP helpdesk or system administrator for help.<br />";
$net2ftp_messages["Unable to move the directory <b>%1\$s</b>"] = "Unable to move the directory <b>%1\$s</b>";
$net2ftp_messages["Unable to move the file <b>%1\$s</b>"] = "Unable to move the file <b>%1\$s</b>";
$net2ftp_messages["Unable to move the file <b>%1\$s</b>, aborting the move"] = "�� ������� �����i����� ���� <b>%1\$s</b>, �����i����� �� ��������.";
$net2ftp_messages["Unable to move the uploaded file to the temp directory.<br /><br />The administrator of this website has to <b>chmod 777</b> the /temp directory of net2ftp."] = "�� ������� �����i����� ������������ ���� � ��������� �����.<br /><br />������������� ����� ������� ������ <b>chmod</b> �� <b>777</b> ����� /temp.";
$net2ftp_messages["Unable to open the system log."] = "��������� �i������ ��������� ���.";
$net2ftp_messages["Unable to open the template file"] = "�� ������� �i������ ���������� ����";
$net2ftp_messages["Unable to open the temporary file. Check the permissions of the %1\$s directory."] = "�� ������� �i������ ����. �����i��� ������� ����� %1\$s.";
$net2ftp_messages["Unable to put the file <b>%1\$s</b> on the FTP server.<br />You may not have write permissions on the directory."] = "�� ������� ����������� ���� <b>%1\$s</b> �� FTP-������.<br />������, � ��� ���� ����.";
$net2ftp_messages["Unable to read the template file"] = "�� ������� ��������� ���������� ����";
$net2ftp_messages["Unable to read the temporary file"] = "�� ������� ��������� ���������� ����";
$net2ftp_messages["Unable to rename directory or file <b>%1\$s</b> into <b>%2\$s</b>"] = "�� ������� ������������� ����� ��� ���� <b>%1\$s</b> � <b>%2\$s</b>";
$net2ftp_messages["Unable to select the MySQL database. Please check your MySQL database settings in net2ftp's configuration file settings.inc.php."] = "Unable to select the MySQL database. Please check your MySQL database settings in net2ftp's configuration file settings.inc.php.";
$net2ftp_messages["Unable to select the database <b>%1\$s</b>."] = "�� ������� ������� ���� ����� <b>%1\$s</b>.";
$net2ftp_messages["Unable to send the file to the browser"] = "��������� �������� ���� �������";
$net2ftp_messages["Unable to switch to the passive mode on FTP server <b>%1\$s</b>."] = "�� ������� ������������ � �������� ����� FTP <b>%1\$s</b>.";
$net2ftp_messages["Unable to write a message to the system log."] = "��������� �������� ���i�������� �� ���������� ����.";
$net2ftp_messages["Unable to write the string to the temporary file <b>%1\$s</b>.<br />Check the permissions of the %2\$s directory."] = "�� ������� �������� ����� � ���������� ���� <b>%1\$s</b>.<br />�����i��� ������� ����� %2\$s.";
$net2ftp_messages["Unexpected state string: %1\$s. Exiting."] = "������i����� ������ �����: %1\$s. ���i�.";
$net2ftp_messages["Unrecognized FTP output"] = "�������� ����� FTP";
$net2ftp_messages["Unzip"] = "�����������";
$net2ftp_messages["Unzip archive <b>%1\$s</b> to:"] = "����������� ���i� <b>%1\$s</b> to:";
$net2ftp_messages["Unzip archives"] = "����������� ������";
$net2ftp_messages["Unzip the selected archives on the FTP server"] = "����������� ������i ������ �� FTP ������";
$net2ftp_messages["Up"] = "������";
$net2ftp_messages["Update"] = "�������";
$net2ftp_messages["Upload"] = "����������� �� ����";
$net2ftp_messages["Upload a new version of the file %1\$s and merge the changes"] = "����������� ���� ����� ����� 1\$s �� ����������� ����";
$net2ftp_messages["Upload directories and files using a Java applet"] = "����������� ����� �� ��������i� �������������� Java ������";
$net2ftp_messages["Upload files and archives"] = "����������� ����� �� �����";
$net2ftp_messages["Upload more files and archives"] = "����������� ���� ����� �� ������";
$net2ftp_messages["Upload new files in directory %1\$s"] = "����������� ���i ����� � ����� %1\$s";
$net2ftp_messages["Upload to directory:"] = "����������� � �����:";
$net2ftp_messages["Username"] = "���i�";
$net2ftp_messages["Version information"] = "I�������i� ��� �����";
$net2ftp_messages["View"] = "�����.";
$net2ftp_messages["View Macromedia ShockWave Flash movie %1\$s"] = "����������� ����� Macromedia ShockWave Flash %1\$s";
$net2ftp_messages["View file %1\$s"] = "�������� ����� %1\$s";
$net2ftp_messages["View image %1\$s"] = "����������� ������� %1\$s";
$net2ftp_messages["View logs"] = "�������� ����";
$net2ftp_messages["View the file %1\$s from your HTTP web server"] = "����������� ���� %1\$s � ������ HTTP-�������";
$net2ftp_messages["View the highlighted source code of file %1\$s"] = "����������� �������� ��� %1\$s";
$net2ftp_messages["WAV sound file"] = "���� WAV";
$net2ftp_messages["Webmaster's email: "] = "������ ���-�������: ";
$net2ftp_messages["Writing some text to the file: "] = "����� ������ � ����: ";
$net2ftp_messages["Wrong username or password. Please try again."] = "����������� i�'� ����������� ��� ������. ���� �����, ��������� �� ���.";
$net2ftp_messages["You did not enter a filename for the zipfile. Go back and enter a filename."] = "�� �� ����� i�'� ����� ��� zip. ������i���� ����� �� ����i�� i�'� �����.";
$net2ftp_messages["You did not enter your Administrator username or password."] = "�� �� ������� i�'� ����������� ��� ������ ���i�i��������.";
$net2ftp_messages["You did not provide any file to upload."] = "�� �� ������� ����.";
$net2ftp_messages["You did not provide any text to send by email!"] = "���� ������ ��� ����������� �� ����������� ����!";
$net2ftp_messages["You did not supply a From address."] = "�� �� ������� ������ ����������.";
$net2ftp_messages["You did not supply a To address."] = "�� �� ������� ������ ����������.";
$net2ftp_messages["You have logged out from the FTP server. To log back in, <a href=\"%1\$s\" title=\"Login page (accesskey l)\" accesskey=\"l\">follow this link</a>."] = "�� ������ � FTP �������. ��� ����� �����, <a href=\"%1\$s\" title=\"Login page (accesskey l)\" accesskey=\"l\">��������� �� �� ���������</a>.";
$net2ftp_messages["Your IP address (%1\$s) is in the list of banned IP addresses."] = "��� IP-������ (%1\$s) ����������� � ������ ����������� IP-�����.";
$net2ftp_messages["Your IP address (%1\$s) is not in the list of allowed IP addresses."] = "��� IP-������ (%1\$s) �� ����������� � ������ ����������.";
$net2ftp_messages["Your IP address has changed; please enter your password for FTP server <b>%1\$s</b> to continue."] = "��� IP ������ ��������; ���� �����, ����i�� ��� ������ �i� FTP ������� <b>%1\$s</b> ��� ����������.";
$net2ftp_messages["Your browser does not support applets, or you have disabled applets in your browser settings."] = "Your browser does not support applets, or you have disabled applets in your browser settings.";
$net2ftp_messages["Your root directory <b>%1\$s</b> does not exist or could not be selected."] = "���� �������� ��������i� <b>%1\$s</b> �� i��� ��� �� ���� ���� ��������.";
$net2ftp_messages["Your session has expired; please enter your password for FTP server <b>%1\$s</b> to continue."] = "��� 䳿 ��� �����; ���� �����, ������ ��� ������ �� FTP ������� <b>%1\$s</b> ��� ����������.";
$net2ftp_messages["Your task was stopped"] = "���� �������� ��������";
$net2ftp_messages["Zip"] = "����������";
$net2ftp_messages["Zip archive"] = "Zip-���i�";
$net2ftp_messages["Zip entries"] = "��i�� Zip";
$net2ftp_messages["Zip the selected entries to save or email them"] = "�������� ��������� �� ��������� �� email";
$net2ftp_messages["en"] = "ua";
$net2ftp_messages["files which were last modified"] = "�����, ������";
$net2ftp_messages["files with a filename like"] = "i�'� ����� ��";
$net2ftp_messages["files with a size"] = "����� � �������";
$net2ftp_messages["from"] = "�i�";
$net2ftp_messages["left"] = "left";
$net2ftp_messages["ltr"] = "ltr";
$net2ftp_messages["net2ftp has tried to determine the directory mapping between the FTP server and the web server."] = "net2ftp ��������� ��������� ��'���� ��������� �� FTP �� ���-��������.";
$net2ftp_messages["net2ftp is free software, released under the GNU/GPL license. For more information, go to http://www.net2ftp.com."] = "net2ftp ����������� ��, �� ����������� �i� �i����i�� GNU/GPL. �i��� �������� i�������i� ����������� �� ������� http://www.net2ftp.com.";
$net2ftp_messages["no - please install it!"] = "�� - ���� �����, ��������� ����!";
$net2ftp_messages["not OK"] = "�� OK";
$net2ftp_messages["not OK. Check the permissions of the %1\$s directory"] = "�� OK. �����i��� ������� ����� %1\$s";
$net2ftp_messages["right"] = "right";
$net2ftp_messages["to"] = "��";
$net2ftp_messages["to:"] = "��:";
$net2ftp_messages["yes"] = "���";

?>