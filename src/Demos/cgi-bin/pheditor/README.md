Pheditor
=======

Pheditor is a single-file editor and file manager written in PHP.

![Pheditor - PHP file Editor](https://pheditor.ir/assets/image/screenrecord-desktop.gif "Pheditor PHP file editor")

### Features
1. Editor with syntax highlighting
2. File Manager (create, rename and delete files and directories)
3. Password protected area
4. Keeping the history of edited files and changes
5. Keyboard shortcuts
6. Access levels for reading and writing and other permissions
7. Terminal

---

### Install & Usage

Install using composer:
`composer create-project hamidsamak/pheditor`

or just upload `pheditor.php` to your web host (and/or rename it as you wish).

---

**NOTES**:
1. The default password is `admin`. Please change the password after install or first login.
2. As the script gives permission to edit files, it is recommended to keep the address secret or protected depending on the web-server you are using.

---

**Optional settings:**

The settings would be editable in the main PHP file (pheditor.php by default).
The settings are as below:
1. Define patterns for files and directories to view/edit (empty means all files & directories)
2. Log file path
3. Show/Hide hidden files
4. Limit access to the page only for an IP address (empty means access for all)
5. Show/Hide main pheditor file (pheditor.php) in files list to edit 
6. History files path
7. Word wrap
8. Changing main directory (`MAIN_DIR`)
9. Enable/Disable Terminal
10. Define allowed terminal commands

---

**Hotkeys:**

1. New File `Ctrl (CMD) + Shift + N`
2. Save File `Ctrl (CMD) + Shift + S`
3. Switch between file manager, editor and terminal `Esc`
4. Double press `Esc` to open file menu
5. Double click on file name to view in browser window/tab.
6. Find `Ctrl (CMD) + F`
7. Find next `Ctrl (CMD) + G`
8. Find previous `Shift + Ctrl (CMD) + G`
9. Replace `Shift + Ctrl + F` or `CMD + Option + F`
10. Replace all `Shift + Ctrl + R` or `Shift + CMD + Option + F`
11. Persistent search `Alt + F`
12. Go to line `Alt (Option) + G`
13. Toggle Terminal `Ctrl (CMD) + Shift + L`

---

**Using without password:**

You can empty the `PASSWORD` constant in the source code to access the script without the password. But it is highly recommended to use it and change the default password after installation.

---

**Access Levels and Permissions:**

There are eight permissions for users that is defined in `PERMISSIONS` constant. You can remove any of them as you need.

Default value: `newfile,newdir,editfile,deletefile,deletedir,renamefile,renamedir,changepassword,uploadfile,terminal`

---
**Thanks to:**

[Laurent](https://github.com/slolo2000)

[fjavierc](https://github.com/fjavierc)
