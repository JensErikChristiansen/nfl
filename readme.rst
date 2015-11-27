##############################
COMP4711 server(s) - fall 2015
##############################

This project provides server-side functionality for Comp4711 assignments
during fall 2015.

*************
Disclaimer(s)
*************

This webapp is provided "as is", with no warranties of fitness or complete
functionality. The webapp is a work-in-progress, and features may be changed
or even eliminated without notice.

Your mileage may vary. Do not eat - this is not a toy. 
Do not use while operating a motor vehicle or heavy equipment. 
Not for resale. Hand wash only. Refrigerate after opening. 
May contain nuts. Driver does not carry cash. 

**************
Intended Usage
**************

This webapp will be accessible for student webapps to connect to, in order to
test and run their assignment webapps, or to play with some of the
distributed technologies we talk about in class.

Students are free to fork and clone this project, or even just download it,
for study or experimentation on their own systems.

Per assignment or lab specs, the students' webapps will need to connect to the 
running server as part of their app's functionality.

On the server this webapp is deployed to, you can access the following...

-   /standings will return an XML document with the most recent standings
-   /standings/latest will return an HTML fragment with the date of the most recent standings
-   /rpc/since/yyyymmdd will return an array of game records, in XML, and using XML-RPC

Note: the original assignment writeup showed the remote method (since) and its parameters,
but I forgot to identify the XML-RPC endpoint (/rpc).

*****
Setup
*****

RDB n/a - all data is stored as XML.
index.php assumes that the framework is in ../system3

***************
Project Folders
***************

/applications   the webapp components
/assets         media
/data           XML & related documents

*******
License
*******

Please see the `license
agreement <https://codeigniter.com/user_guide/license.html>`_

*********
Resources
*********

-  `Informational website <https://codeigniter.com/>`_
-  `Source code repo <https://github.com/bcit-ci/CodeIgniter/>`_
-  `User Guide <https://codeigniter.com/user_guide/>`_
-  `Community Forums <https://forum.codeigniter.com/>`_

***************
Acknowledgement
***************

This project (such as it is) was written by James Parry, Instructor in Computer Systems
Technology at the British Columbia Institute of Technology,
and Project Lead for CodeIgniter.

CodeIgniter is a project of B.C.I.T.
