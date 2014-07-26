<?php

?>


<?php include("header.php"); ?>


<div style="margin-left:12px; margin-top:1px; margin-bottom:100px; margin-right:100px ">

<h2> <a name="top.php">Integra RX System Architecture:</a></h2>

<ol>
<li> <a href="#1.1">Introduction	</a></li>
<li><a href="#1.2">Midas - Multi-tiered Distributed Application Services	</a></li>
<li><a href="#1.3">Advantages of Midas	</a></li>
<ul>
<li><a href="#1.3.1">3.1	Distributed applications	</a></li>
<li><a href="#1.3.2">3.2	Centralised business rules, audit control</a>	</li>
<li><a href="#1.3.3">3.3	Thin client</a>	</li>
<li><a href="#1.3.4">3.4	Simplification of client installation/upgrade</a>	</li>
<li><a href="#1.3.5">3.5	Database independent</a>	</li>
<li><a href="#1.3.6">3.6	Facilitates offline model	</a></li>
<li><a href="#1.3.7">3.7	Performance benefits from reduced network traffic</a>	</li>
<li><a href="#1.3.8">3.8	Browser support	</a></li>
</ul>
<li><a href="#1.4">Implementation distribution</a>	</li>
<li><a href="#1.5">Housekeeping</a>	</li>
<ul>
<li><a href="#1.5.1">5.1	Security	</a></li>
<li><a href="#1.5.2">5.2	Audit Trail / Logging</a>	</li>
<li><a href="#1.5.3">5.3	Backups	</a></li>
<li><a href="#1.5.4">5.4	Data Access	</a></li>
<li><a href="#1.5.5">5.5	System Configuration / Access Privileges</a>	</li>
<li><a href="#1.5.6">5.6	Data Integrity</a>	</li>
</ul>
<li><a href="#1.6">Borland Delphi / Object-oriented programming</a>	</li>
</ol>


<h4> <a name="1.1">Introduction </a></h4>
<a href="#top">Top</a>
<p>
This document is an introduction into the nature and technical architecture of IntegraRX. <br />
IntegraRX is developed using Borland Delphi version 5 (true object oriented development language) with an Oracle back-end database (versions 8.0x, 8i).  It runs on the Microsoft Windows 2000/NT Server/Workstation, operating systems.  <br />
It is built using a three-tier methodology, which is the latest, and to our minds the best, enterprise development solution available.  <br />
The remainder of this document will give the reader some background information in relation to:
<ul>
	<li>Midas - Multi-tiered Distributed Application Services</li>
	<li>Advantages of Midas</li>
	<li>Implementation distribution</li>
	<li>Housekeeping</li>
	<li>Borland Delphi / Object-oriented programming</li>
</ul>
</p>

<h4> <a name="1.2">1.2	Midas - Multi-tiered Distributed Application Services</a></h4>
<a href="#top">Top</a>
<p>
The three-tier development methodology is known as Midas within Borland Delphi.
</p>
<p>
In the standard historical client-server systems, database connectivity was performed in two tiers.  Put simply, this is where there is only one application and it talks directly to the database through a database engine driver (ODBC, Jet engine, etc.).  The Borland Database Engine (or BDE) is the one that is in use within Delphi.
In our 3-tiered applications, as is the case with IntegraRX, there are two applications.  One application, the server layer, acts as the database communication application.  It contains objects that expose the data to a client application through a COM interface.
</p>
<p>
This allows for great flexibility in terms of where your databases are (distributed databases) and also the physical placement of the data provider server layer applications (distributed processing, load balancing and fault tolerance).  It also means that no database connectivity software needs to be resident on the client machines (unlike standard 2-tier applications), thus providing thin-client potential.  The client application to server application connection also provides much more control over the network traffic, as the data required can be reduced to the bare minimum required. 

</p>

<h4><a name="1.3">1.3	Advantages of Midas</a></h4>
<a href="#top">Top</a>
<p>
As mentioned above, the three-tier approach to implementation has many advantages, including the following:

<h5><a name="1.3.1"> 1.3.1	Distributed applications</a></h5>
<a href="#top">Top</a>
<p>
1.	Load balancing<br />

The easy explanation is that load balancing is spreading your user base out over multiple server layer applications, with each server layer being on its own server PC.  All server layers can still be pointed at the one database (or multiple databases), but their processing is split up across the network.  There are also ways to implement dynamic load-balancing where you use an algorithm to decide which server layer a client should use when connecting, based on the network usage and server layer PCs usages.<br />

2.	Fault tolerance<br />
If your server machine becomes unavailable, then you can get the server layer to automatically switch to a backup server without any recompilation.  Simply re-direct the server application layer to the new server.

</p>

<h5><a name="1.3.2">1.3.2	Centralised business rules, audit control</a></h5>
<a href="#top">Top</a>
<p>
In most client/server applications, each client application was required to keep track of the individual business rules for a business solution.  Not only does this increase the size of the executable but it also means that strict version control has to be maintained (if user A has an older version then your business rules may no longer be performed consistently).  Placing the business rules on the application server requires only one copy of those rules to be created and maintained.
</p>

<h5> <a name="1.3.3">1.3.3	Thin client</a></h5>
<a href="#top">Top</a>
<p>
In addition to the business rules, the common Client/Server application contains the majority of the data access layer, i.e. all of the database connectivity, etc., again producing a more sizeable executable known as a fat-client.  Also the client PC would have to have the database engine driver for database connectivity (The BDE, Borland Database Engine, in the case of IntegraRX) and the RDBMS client utilities installed.
</p>

<h5><a name="1.3.4"> 1.3.4	Simplification of client installation/upgrade</a></h5>
<a href="#top">Top</a>
<p>
Because there is no database client software required then, at most, all you need on the client PC is the client application program (which in itself doesn’t even need to be there as it could be on a shared network drive) and two DLLs, i.e. Midas.DLL and DBClient.DLL. 
</p>

<h5><a name="1.3.5"> 1.3.5	Database independent</a></h5>
<a href="#top">Top</a>
<p>
You can write a server application in any language to any database and as long as it is capable of providing the interfaces for the client application to receive the data it requires then you can just replace the server program.
</p>

<h5><a name="1.3.6"> 1.3.6	Facilitates offline model</a></h5>
<a href="#top">Top</a>
<p>
Use of the client datasets permits the application to download to disk files and still run the application, disconnected from the server.  This is mainly facilitated by the fact that there is no database connectivity within the client application.
</p>

<h5><a name="1.3.7"> 1.3.7	Performance benefits from reduced network traffic</a></h5>
<a href="#top">Top</a>
<p>
Apart from the load balancing aspect of the server, there are also performance gains to be had because the client application is given much more control of the data transmitted across the network.
</p>

<h5><a name="1.3.8"> 1.3.8	Browser support</a></h5>
<a href="#top">Top</a>
<p>These factors/products ensure that the development, execution environment and database are right up-to-date with the latest technologies available. </p>

<p>
This architecture also facilitates the implementation of an enterprise wide solution where client PCs access central or distributed databases with ease with no configuration overhead, over a COM interface to a selected server.
</p>
<p>
Due to the benefits of its three-tier implementation methodology and use of what is widely recognised as the world leading medical database, Oracle, it provides the best method for providing a scalable and robust system, capable of supporting any size practice from single-user systems to large multiple-chain stores.
</p>

<h4> <a name="1.4">Implementation Distribution</a></h4>
<a href="#top">Top</a>
<p>
Both of the previous sections have mentioned the facilities for distributing the enterprise application processing, across multiple client PCs, multiple servers and server layer applications, multiple databases and multiple database servers and/or databases.  The three-tier approach to the application’s design and implementation gives the business much more flexibility and control in terms of the manner in which they wish to manage their data, network, servers, etc.
</p>
<p>
In the simple scenario, there is one database held in a central location, which has one server layer application residing on it to which all client PCs access over a network (LAN, WAN, Internet).  This may be across multiple practices where the database is physically situated at a head office and all client IntegraRX applications access it.  This type of configuration is loosely referred to as the ‘Online’ solution, in that all clients are online to the same head office database at all times and all data is real-time.
</p>
<p>
There are many combinations of options, but the main alternative to the scenario described above is the ‘Replication’ solution.  This is primarily only of interest to a multi-practice business where there are multiple stores running the application, but there is no requirement for ‘online’ access to a central database all the time, or no requirement for access to all practice’s data in real-time.  Effectively what this means is that each practice has their own local database that IntegraRX runs to, i.e. they have their own network where the client PCs access a server layer application situated on a server PC (which need not necessarily be a dedicated server) on that network, and which has the IntegraRX database installed on it.  A central database may then exist to accumulate all practice information, primarily for reporting, finances or central stock control purposes.  The data recorded in each practice is ‘replicated’ up to the central head office database on an automated schedule basis (which can be configured as anything from immediate to once a day, etc.) and changes made in the central site which affect a practice is replicated back down to that practice’s database.
</p>
<p>
It is important to understand that there is no difference between these two configurations as far as the general operation of the IntegraRX application is concerned.  Fundamentally it is simply directed at the application server layer, which can exist anywhere once that location is accessible to the client PC on which IntegraRX is being run.  All of the replication facilities are an integrated part of Oracle’s system software and have no impact to or with the IntegraRX application.
</p>
<p>
That being said, there are a couple of different functions within IntegraRX depending on the architecture chosen.  For example, in the replication model, if the user wishes to access a patient record from another practice, then a dial-up or network connection would have to be made to that practice’s server or the head office server in order to download that patient’s file of information.  In the online model, this information is directly available to the system. 
</p>

<h4><a name="1.5">1.5  House Keeping</a></h4>
<a href="#top">Top</a>
<p>
The system architecture also provides for housekeeping operations to be automated, such as backups, recreation of indices, clearing of log files, etc.
</p>
<p>
The architecture has some important general considerations:
<ol>
<li> Security</li>
<li> Audit Trail / Logging</li>
<li> Backups</li>
<li> Data Access</li>
<li> System Configuration / Access Privileges</li>
<li> Data Integrity</li>
</ol>

<h5><a name="1.5.1">1.5.1	Security</a></h5>
<a href="#top">Top</a>
<p>
There are four possible levels of security and logging:</p>

<b>1.5.1.1	Firewall </b>
<p>
Self-explanatory.
</p>
<b>1.5.1.2	Oracle Security </b>
<p>
Passwords and security services are provided directly by Oracle via multi-threaded application server (one thread per client).
</p>
<b>1.5.1.3	Windows XP Security</b>
<p>
When the user switches on a client machine, they will eventually be required to log into the network.  For this login to succeed, the user must enter a username and password combination that exists within the domain controller.  All logins and attempted logins are logged through XP and are viewable through the Event Viewer program in Administrative tools.  XP can also take care of network privileges that that user has thus controlling their access at the user level.  It can assign these users to groups and control privileges and access at the group level.  It can retrieve passwords after configurable time periods and can even limit the times at which it is valid for those users to access the network.  Failed login attempts can be configured to lockout that user from further login attempts.  Any valid network user will be able to login to any client machine using his/her own username and password.
</p>
<b>1.5.1.4	Application Security</b>
<p>
Like the network login, IntegraRX also requires a user to login when executing the client application.  As with the network login, a valid combination of username and password must be entered.  These usernames and passwords are stored within Oracle, and can be the same or different to the XP login usernames and passwords.  Any valid IntegraRX user will be able to login to IntegraRX from any client machine using his/her own username and password.  The Oracle auditing can record all logins and disconnections.  All failed attempted logins are recorded in the IntegraRX log files.  The system administrator can maintain valid IntegraRX users through the staff maintenance section of the IntegraRX configuration screen.  Each individual user can maintain his/her own password and PIN.  The staff maintenance section also permits the system administrator to prevent entry to the application for specific users.  
</p>

<h5><a name="1.5.2">1.5.2	Audit Trail / Logging</a></h5>
<a href="#top">Top</a>
<p>
Both Oracle and Windows Server 2003 provide mechanisms for logging/auditing the begin and end times of sessions for all users and as such reports can be produced from the Oracle Audit trail and can be viewed within the User maintenance area of the Windows Server 2003 to give attendance information.
</p><p>
Database audit trail can be provided in two ways.  The first is by using Oracle’s audit trail methods.  There are many ways of implementing this, but generally the method chosen is to have Oracle log all database connections and disconnections as well as recording modifications (insert, update & delete) made to the data.  What the Oracle data audit trail provides are logs of what user changed database information, the operation being performed and when was the operation performed.  It does not contain any specific information relating to the actual change that was carried out.  For this reason, IntegraRX can implement its own audit trail mechanism.  This works very efficiently by virtue of the three-tier methodology.  The database contains what are effectively duplicates of all database tables.  The application servers can catch when data modifications are being made by the client applications.  For each operation being performed, the application server can create a new audit or journal record of exactly what information is being inserted, updated or deleted, when and by whom.  The login information provides the application servers with the information it needs to track all database changes back to that specific user.  Reports can then be produced on these journals to provide a history of all data modifications made even to the level of specific patients or visits.  This is implemented at application server level to minimise load on the clients.
</p><p>
While IntegraRX is being run, all of the main important operations which are being carried out, pages selected, buttons pressed, etc., are all logged to text files in that PC’s disk.  These log files contain not just any errors that may occur but give the software support personnel the necessary information to track the movements of the user prior to the occurrence of the user.  These application logs are an important feature of IntegraRX to help support staff diagnose issues that may arise.

</p>

<h5><a name="1.5.3">1.5.3	Backups</a></h5>
<a href="#top">Top</a>
<p>
There are three levels of backups that can be performed.  Oracle is capable of backing up either the entire database or just the transaction logs to disk or tape.  Within the operating system a suitable third party backup package such as BackupExec can be used to backup disks or sections of disks from any machine on the network.  The ideal situation is probably the backup of the entire database with selected areas of the servers disks to tape on a nightly basis using an established third party backup application, with the transaction logs being backed up to disk at periodic intervals during the day.  All of these backups can be automated to ensure the minimum user interaction requirement, with the only manual responsibility being the confirmation of successful backups and the changing of the tape for the next night’s backup, and all automated tasks can be configured to run at whatever intervals are required.  A cyclical sequence of backup tapes should be used to ensure a minimum of the last 5 days backups.
</p>

<h5><a name="1.5.4">1.5.4	Data Access</a></h5>
<a href="#top">Top</a>
<p>
Due to Oracle’s capability of storing large amounts of data (with some production databases containing terabytes of data), the requirement for archiving old information becomes less of a concern than that of a mini-computer system where disk space is a limitation to be circumvented.  
</p>
<p>
There are also substantial benefits to be gained from retaining as much of the system’s information as possible online, to avoid unnecessary delays in attempting to retrieve archived information where an archived patient happens to come into the practice.  Having all your information online also provides for the most flexibility in terms of the user’s ability to produce up-to-date and complete management information.  As such, there is no specific archiving method implemented within IntegraRX, however, there is no reason why archiving could not be implemented in a fairly simple automated fashion to remove information from the live database to either another database for archived information or to CD-Rom or tape device.

</p>

<h5><a name="1.5.5">1.5.5	System Configuration / Access Privileges</a></h5>
<a href="#top">Top</a>
<p>
IntegraRX implements much of the system configuration within the application itself through the configuration screen.  This permits the user to customise the practice and user application to suit the needs of the business and of the individual user.  Configuration included which screens they see, what buttons are available, what examinations they use, how their reports are to be presented, system passwords, etc., with overall control for system configuration and all staff configuration being the responsibility of the practice administrator, who can optionally revoke privileges from other staff members from changing certain configuration options.  Also, system wide it provides the ability for the users to define the contents of drop down lists in a self-learning of maintenance screen method.  For this reason, other system utilities are not generally required from the users perspective.  However, IntegraRX does have a utilities program that perform some housekeeping tasks to aid in software upgrades and to help software support personnel to diagnose and correct issues which may arise.
</p>

<h5><a name="1.5.6">1.5.6	Data Integrity</a></h5>
<a href="#top">Top</a>
<p>
All data input to the system is verified at time of entry within the client application ensuring consistent and valid data is recorded to the database.  IntegraRX will not permit invalid data from being entered and will also verify the storage of all entered information upon leaving a screen, page, patient, etc.  Invalid data input is also recorded within the IntegraRX log files.  Any errors that occur are reported to the user in friendly localisable message dialogs.  Errors on storage of information to the database are reported back to the user with facilities allowing the user to select the appropriate course of action and correct the information prior to re-saving. 
</p><p>
With this save-as-you-go approach to recording the information back to the database and the use of Oracle as the database management system, any invalid or improper shutdowns of either the client application/system or server application/system are handled efficiently with the most downside being that the user may lose what they were in the middle of typing but nothing prior to that point. </p>
<p>
All information recorded, in any location of the application, references the patient to which the information was recorded against and even the visit on which the information was entered (provided the information in question is not non-visit or non-patient related).  In addition, every record created in every table stores the user that created that record, thus backing up the audit trail information.</p>
<p>
These design considerations, in conjunction with the security, backup, audit, configuration and user access abilities of the system ensure the integrity of the data recorded.


</p>

<h4><a name="1.6">1.6	Borland Delphi / Object-oriented programming</a></h4>
<a href="#top">Top</a>
<p>
Object-oriented programming is an extension of structured programming that emphasizes code reuse and encapsulation of data with functionality.  Once you create an object (a class or component), it can be used in different applications, thus reducing development time and increasing productivity.  An object is a data type data type that encapsulates data and operations on data in a single unit.  Objects are collections of data elements that contain procedures and functions (methods).  An object’s data elements are accessed through properties:

<ul>
<li>
Encapsulation <br />
The combination of data and functionality within a single unit 
</li>

<li>Inheritance <br />
Objects derive functionality from their ancestors 
</li>

<li>Polymorphism   <br />
Different objects derived from same ancestor support same methods and properties 
</li>
</ul>
Other languages, such as Visual Basic, are pseudo object-oriented in that they use objects and methods, but they do not support these three basic object-oriented concepts. 

</p>
<?php include("footer.php"); ?>