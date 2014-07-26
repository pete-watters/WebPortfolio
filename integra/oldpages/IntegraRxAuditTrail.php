<?php

?>


<?php include("header.php"); ?>


<div style="margin-left:12px; margin-top:1px; margin-bottom:100px; margin-right:100px ">

<h2> <a name="top">Integra RX Audit Trail:</a></h2>

<br />
<ol>
<li><a href="#1.1">The need for systems security</a></li>
<li><a href="#1.2">Security Chalenges</a></li>
<li><a href="#1.3">What is an audit trail?</a></li>
<li><a href="#1.4">Implementations of Audit Trail in Integra Rx</a></li>
<li><a href="#1.5">Audit Trails compared</a></li>
</ol>

<h3><a name="1.1">1.1	The need for systems security</a></h3>
<a href="#top">Top</a>
<p>
There is a growing body of evidence the electronic records in healthcare are cost effective and benefit patients, clinicians and healthcare management alike.  The demanding storage requirements for and the difficulty of retrieving paper records are well documented.  Furthermore the issue of duplicating paper records across healthcare institutions means that it is difficult to compile a composite patient record.  As a consequence, healthcare has a growing interest about the possibility of dispensing with paper records and relying exclusively, or at least increasingly, on electronic records. Used and managed properly, electronic records reduce bureaucracy and support more effective and efficient healthcare.  However, the use of technology brings with it new issues of security and legal requirements as well as practical aspects that need to be catered for in order to reap the full benefits of such a system without any disadvantages, particularly to patients, being incurred.</p>

<p>
The focus of this paper is to address these security requirements and to show how IntegraRX caters for these requirements.  Specifically, this paper will focus on the role of the Audit Trail in IntegraRX and how this feature fits into the data security picture.
</p>

<h3><a name="1.2">1.2	Security challenges</a></h3>
<a href="#top">Top</a>
<p>
The security challenges facing the medical IS department are manifold, and in this section we will briefly look at some of these before discussing the Audit Trail in detail.
</p>

<h4>Network security:</h4>
<p>
IntegraRX is a three-tier application, which is distributed over the network.  The primary reasons for deploying a three-tier system are: efficient resource management, improved scalability, and security. In a three-tier system, the middle tier can act as a concentrator, allowing many user devices to share a relatively few connections to the back-end database system. Moreover, in a three-tier system the middle tier can focus on presentation of data to the user, allowing the back end tier to focus on management and processing of data. Since databases are optimised for efficient data management, moving responsibility for data presentation and connection management to the middle tier can improve system efficiency and scalability. Moreover, application logic in the middle tier can limit access of users, and provide another layer of isolation to sensitive data maintained in database.  This improves system security.
</p>

Figure 1:  Illustration of three-tier architecture
<p>
In practice, this means that the application is distributed in three parts – the client, the server and the database applications. In a hospital environment, these “tiers” will be located on separate machines, a client machine for data entry and retrieval a server machine for data collation and authentication and the database for data processing and management.
</p>
<p>
The first level of security to discuss is the access to the network.  IntegraRX runs on Microsoft Windows NT workstation at the client end, with both the server and the database working on Microsoft Windows NT Server. These network operating systems offer enterprise computing strength security. The platforms use network logon passwords and offer the IS department improved network management features, including user profiles.  
</p>
<p>
This offers the first level of security, as only an authorised user with a password can log onto the network, to access patient files. They do not have permissions or the utilities to access the database directly, but are limited to interfacing with the Patient records through the client application.
</p>

<h4>User authentication:</h4>
<p>
Once the user has logged onto the network, the next step is to get access to the client application. IntegraRX also has the ability to manage and allocate permissions for particular users. To log onto IntegraRX and view patient records, the user will once again require a user name and password. It is not possible to log on without these permissions.</p>

<h4>User access control:</h4>
<p>
Within the application itself, it is possible to limit access to certain parts of the application for certain users.  Users can be set up with a profile, which allows them to view, enter or delete information on certain parts of the application only. The user must log on with their user ID and password, and thus all their transactions must be allowed by the server.  This feature ensures that data can only be seen or edited by somebody who is both qualified and has permissions to do so.</p>
<p>
The system administrator manages user access control, and they are responsible for ensuring that employees are only allowed access to relevant areas of the application.
</p>

<h4>Critical function security:</h4>	
<p>
To further guarantee data integrity Ocuco offers the ability to assign passwords to critical functions such as cash management for IntegraRX Dispensary users. This feature ensures that any transactions recorded in critical areas of the application must have a PIN number recorded against it. Thus the application can record who performed which transaction.
</p>

<h4>Database:</h4>
	
<p>The database management system will reside on its own machine, and will be accessed by the server “tier” of the application. The database will only accept data input or alteration from an authentic user who has permissions and the required passwords.
</p>

<h4>Data backup:</h4>
	
<p>The last element of data security is a regular data back up policy.  All data stored on an IntegraRX system, must have an adequate data backup policy. </p>
    
    
<h3><a name="1.3">1.3	Electronic patient records and legal issues</a></h3>
<a href="#top">Top</a>
<p>
It is important to bear in mind that legal requirements or constraints can affect every aspect of the use of electronic records. Patient records contain information, which may be needed for various purposes. These purposes may include for example, use for audit and accountability, for research and as evidence in civil or criminal proceedings. Different legal considerations may apply depending on the purposes for which the information in the records is used.
</p>
<p>
The first legal issue is data protection and computer misuse. Under the Computer misuse act of 1990 it is a criminal offence to access or modify computer material without authorisation. For this law to be implemented, the IS department will need a method to record who accessed or altered records at any time.  The Data protection act has been further reinforced through the EU Data Protection Directive 95/46/EC. This directive introduces further constraints on how sensitive “personal” data is processed, ensuring that data is retained and that data is only available to those who will use and process it for professional reasons. IntegraRX is fully compliant with these statutes and directives, through the security features outlined in the previous sections.
</p>
<p>
The next legal issue to be examined is that of legal evidence. Exceptionally, electronic records maybe required as evidence.  Earlier concerns about the admissibility of electronic records in civil courts have, in the main, been addressed by the repeal (effective Jan. 1997) of Part 1 of the Civil Evidence Act 1984, need to be met if the records are to be used in evidence.  In order to establish the quality and reliability of an electronic record, it will therefore be important to be able to prove that the computer was not misused and was operating properly at the time the record was produced.  In order to prove this, some method of recording all interactions with the system is required, so that the records on the system can be shown to be intact. This is where the additional IntegraRX security feature, Audit trail plays a key role.
</p>

<h3><a name="1.4">1.4	What is an audit trail?</a></h3>
<a href="#top">Top</a>
<p>
A record showing who has accessed a computer system and what operations he or she has performed during a given period of time. Audit trails are useful both for maintaining security and for recovering lost transactions. Most accounting systems and database management systems include an audit trail component. </p>

<p>
As we discussed earlier, only authorised users can access the system and within the system they are only authorised to access pertinent areas of the application. For example, the receptionist is allowed access to the scheduler and to the patient demographic data, but is not allowed access to confidential patient medical information.  Only the professional can access these areas and they record their findings on the program. However, since the data is stored in a soft format, what is to stop the professional or another from editing past diagnosis or findings records? If we compare this to the paper file, it would be possible to decipher whether a file had been altered subsequently through scientific analysis of the print or the file. In order for a soft file to be admissible in court, we need to have a mechanism to prove that the file had not been tampered with.  If the file had been tampered with, we need a mechanism to ascertain who did so, when and ideally what they actually changed.</p>
 
<p> 
As mentioned earlier, IntegraRX is a three-tier application consisting of the client, the server and the database components. The client application does not interface directly with the database, but rather it updates the database through the server layer. A database is a server application, which processes, manages and stores data. A database is made up of a series of tables and fields, with each table populating the fields with records.  For example, a patient table may include fields for patient ID, first name, surname and telephone number.  In practice the user deals with the client application on their desktop and is not aware of the background processing that is done between the Server layer and the database management system.
</p>
Figure 2:  Example of a typical patient database table
<p>
The audit trail is a shadow record of the tables stored in a database. It notes every time the server layer accesses a database table, on behalf of a user/client. It records the action, which has taken place, the user who performed that action and the time at which they did so. Thus, it is possible for the database administrator (DBA) to ascertain who enters or changes records in the system.  Conversely, this enables the DBA to verify that if there are no entries in the Audit trail for a table, then those records have not been altered or tampered with.  Thus, one can verify that the record is a veritable copy of what was recorded in the first instance and was not subsequently altered.
</p>

<h3>Implementations of audit trails in IntegraRX</h3>
<p>
IntegraRX implements audit trails on two levels. It implements the audit trail using the Oracle methodology and it implements it through the IntegraRX application.  In the following paragraphs we will discuss these methodologies and describe the differences between them.
</p>
<p>
Firstly, the Oracle implementation offers the ability to audit your database for all interactions with your database tables. Using this method, the auditor can record who interacted with that table, when they did it and what action they performed.
</p>
<p>
In IntegraRX, Ocuco has taken this feature a step further. In IntegraRX, we cannot only record the above mentioned, but we can also record what data was actually recorded in the table. Thus the shadow table will include the action, the user who performed the action, the time at which they performed this action and the information, which they inserted or updated on this table. For example, IntegraRX has a Patient table which includes patient ID, first name, surname, address, GP etc. This table will also have a shadow table, called the patient journal table.  The purpose of this table will be to simply record all of the interactions made with the patient table.  Thus, for the patient table, we will have a corresponding journal table, which will record every action taken on that table, the user who performed this action, when they performed this action and what they inserted or updated on this table.  This extension of Audit Trail techniques allows us not only to record who interfered with medical records but to actually rebuild the data that those tables had previously held, where such requirements may arise. Thus, even through manipulation data cannot be lost.
</p>
Figure 3:  Audit trail table of the above patient table
<p>
This audit trail implementation thus serves two purposes. Firstly, it makes the electronic patient record a legally admissible piece of evidence in court. This is achieved, because through the audit trail we can now prove that the record has not been tampered with or altered in any way. Secondly it secures us in the knowledge, that should anybody decide to tamper with our records, we always have the capability to rebuild the tables to their original state.
</p>

<h3> <a name="1.5">1.5 Audit Trails Compared </h3>
<a href="#top">Top</a>
<p>
The audit trail is one of the most contentious issues in the introduction of the electronic patient record today.  Some vendors claim to have the functionality of the Audit Trail, but in reality the database products they provide cannot offer the security required to implement an audit trail satisfactorily. Products such as Microsoft Access are desktop database products with some development capabilities, but do not offer real three-tier security solutions of databases such as SQL Server and Oracle.
</p>
<p>
The NHS published a circular (HSC1998/153) outlining the guidelines to using electronic patient records in hospitals from a legal perspective. This circular examines the issue of identification, authentication, audit, accountability and data integrity.  IntegraRX complies with these guidelines.
</p>
<p>
Ocuco have chosen the Oracle platform because of their continued commitment to open platforms and their industry leading security accreditations.  Oracle Corporation has designed Oracle8i to meet all relevant security standards; additionally, Oracle Corporation is at the forefront of creating new technology and working with standards groups to extend current standards.  Oracle8i meets functionality and open systems standards as well as being designed to meet security standards. Oracle8i is fully compliant with ANSI/ISO SQL standards. In addition, Oracle Corporation proposed its roles facility to the ANSI/ISO X3H2 SQL standards committee, and it was accepted into the SQL3 specifications.  Oracle8i and Oracle Advanced Security support a number of relevant standards, including SSL for authentication, X.509v3, as well as Public Key Certificate Standards, such as PKCS#10, for certificate signing requests. Oracle Internet Directory provides an LDAP v3 implementation built on the Oracle8i database.
</p>
<p>
Oracle has participated in multiple security evaluations since the advent of Oracle7. Oracle7 has completed security evaluations at class C2 against the U.S. National Computer Security Center (NCSC).  Trusted Computer System Evaluation Criteria (TCSEC or "Orange Book"), and Oracle7 has also been evaluated against the European Information Technology Security Evaluation Criteria (ITSEC) at assurance E3 (with functionality F-C2 in conjunction with an F-C2 operating system).  Oracle7 and Oracle8 have also been evaluated against the Russian Criteria, at level III and level IV, respectively.  </p>
<p>
Oracle7 and Oracle8 is in a Common Criteria evaluation against the Commercial Database Protection Profile. Oracle has also been a leader in adoption of the Common Criteria (CC), which has recently been adopted as ISO standard 15408, as well as developing multiple protection profiles. A benefit of a Common Criteria certificate is that it is recognized and accepted by multiple governments (US, UK, Germany, France, Netherlands, and Australia, to name a few).  Oracle Advanced Security is undergoing a US Federal Information Processing (FIPS)-140 certification at level 2, with completion expected in Q4 1999.  A table of Oracle security evaluations’ status follows:

</p>
Figure 4:  Security certifications of Oracle database, which is implemented in IntegraRX 
<?php include("footer.php"); ?>