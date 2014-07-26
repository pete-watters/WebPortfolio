<?php

?>


<?php include("header.php"); ?>


<div style="margin-left:12px; margin-top:1px; margin-bottom:100px; margin-right:100px ">

<h2><a name="top"> Integra RX Technical System Concepts:</a></h2>

<ol>
<li><a href="#1">Introduction	</a></li>
<li><a href="#2">Replication and Distributed Environment</a></li>
<li><a href="#3">Shared Master Data</a></li>
<li><a href="#4">Functionality Within Integra Rx</a></li>
<ul>
<li><a href="#4.1">4.1	Practice drop down selection	</a></li>
<li><a href="#4.2">4.2	Distribution changes</a>	</li>
<li><a href="#4.3">4.3	Bulk updates</a>	</li>
<li><a href="#4.4">4.4	Stock transfer</a>	</li>
<li><a href="#4.5">4.5	Reporting	</a></li>
</ul>

<li><a href="#5">Head Office Value Added</a></li>
<ul>
<li><a href="#5.1">5.1	Central backup	</a></li>
<li><a href="#5.2">5.2	Interfaces with other head office systems	</a></li>
</ul>
<li><a href="#6">Responsibilities</a></li>
<li><a href="#7">Maintenance and support</a></li>	
<li><a href="#8">Glossary</a></li>
 </ol>

<br />

<h4><a name="1">1 Introduction</a> </h4>
<p>
IntegraRX (and its sister product IntegraPOS) is a software package that supports the activities within a retail pharmacy environment.  
IntegraRX Enterprise is a variant of this same software package, but is specifically focused on the needs of a multi-site organisation.  The Head Office component of IntegraRX Enterprise is called IntegraHO.
</p>
<p>
Enterprise can be a difficult topic to grasp, and a difficult concept for Ocuco to communicate to customers and potential customers. This is partially because much of what facilitates the enterprise model happens in the background and is invisible to the user.  By background we mean that its capabilities are invested in the way in which the application was written, the way in which the database was structured, the way in which internal processes are controlled, and the physical multi-location distribution of data throughout multiple databases. 
</p>
<p>
The nature of Enterprise and its somewhat intangible features lead to some very fundamental questions, such as:
<ul>
<li> What is it? </li>
<li>What does it do for me?</li>
<li>What value does it have?</li>
<li>What am I paying for?</li>
<li>How do I use it?</li>
<li>How do I make the most of it?</li>
<li>Where do I go from here?</li>
</ul>
</p>
<p>
The answer to many of these questions can equally be somewhat intangible, or hard to identify / quantify. This is so due to a number of factors: the background nature of what happens in an enterprise environment, the associated inability to quantify exactly what Enterprisation means to an organisation, the difficulty in attributing value to what it permits, etc. It can also be hard to quantify in a general sense because the success of enterprise installations is based on many factors:
<ul>
<li>The business model of the enterprise organisation</li>
<li>Whether or not central functions are to be performed</li>
<li>How independent or autonomous the local sites are</li>
<li>How much resource, time and effort is available in the head office</li>
<li>Whether or not separate head office systems are to be integrated (such as SAP, ERP)</li>
<li>Is there an enterprise IT department</li>
<li>How close an organisation is the enterprise as a whole</li>
<li>Multiple-practice functionality requirements of the business</li>
<li>How much value the enterprise places on the paperless office concept</li>
</ul>
</p>
<p>
To take the most basic question of all first, what is IntegraRX Enterprise? In actual fact, there are several answers to this, as Enterprise is not just one thing in isolation. You can think of Enterprise as:

<br /><b>
•	A state of mind</b><br />
What we mean by this is that, by its nature, it forces a paradigm shift in thinking, away from the sole trader mentality and into a thought process of operating the business in a multi-location, distributed database environment. The owner/operator needs to take on board certain characteristics of the business and functional impact that the enterprise environment causes. This includes understanding the conceptual nature of what a distributed environment is, what database replication is, the timing of data being available in multiple locations, distribution of information from the head office, head office central control of list contents, and so on. 
<br />
<br /><b>
•	A business model</b><br />
In terms of a business model, IntegraRX Enterprise facilitates a uniformity across all store locations in that it controls (or, more accurately, can control) that all stores see (or can see) the same examination list, use the same recall and referral letters, share the contents of various drop down lists and categories (such as hobbies, medical and marketing categories, examination results, etc.). Additionally, it provides facilities whereby things like stock, promotions, discounts, etc. can all be configured and controlled centrally. Each Enterprise implementation is dealt with as a project between Ocuco and the customer concerned. The specific sharing and control requirements are agreed with the customer in advance during the planning phase.
<br />
<b>
•	A technical solution</b><br />
Technically, the enterprise environment is achieved by use of what is known as ‘replication’. This is an Oracle database facility whereby each store can have its own separate database (to which their store application runs and stores information), and that that database is a sub-set of a ‘master’ database existing at the head office. The head office contains all data from all stores – and it is then the process of replicating data which sends information up from the stores to head office and down to the stores from the head office.
<br />
<b>
•	A set of software functionality features</b><br />
There are implications of running in an enterprise environment within the IntegraRX application itself. In some instances, this is the provision of additional features and functionality at either or both the head office and the local stores. In some instances, this is the prevention of certain functions in the local stores which would be available in a stand-alone system. Further information on this is shown below.<br />

<p>
Some of the other questions raised above in terms of Enterprise’s intrinsic value, and how an organisation gets the most out of it can typically only be answered by the organisation themselves, and typically only after an initial period of grasping the conceptual nature of IntegraRX Enterprise, while implementing and supporting a roll-out to enterprise stores.

</p>

<h4> <a name="2">Replication and distributed environment</a></h4>
<p>
In the simple scenario, there is one database held in a central location to which all client PCs access over a network (LAN, WAN, Internet).  This type of configuration is loosely referred to as the ‘Online’ solution, in that all clients are connected online to the same database at all times and all data is real-time.
</p>
<p>
Typically, when dealing with a non-enterprise environment, this means that it is within a local area network, such as those in optical practices. However, this does not necessarily have to be the case, and the environment can have a broad range of possible implementations. Indeed, it could have a multi-practice implementation where the database is physically situated at a head office and all client IntegraRX applications access it, regardless of their location.  
Fig. 1: Example of an online distributed environment
</p>

<p>
With the scenario above, where you could have a multi-practice ‘online’ solution, obviously the communication line is critical in that type of environment. Because of the nature of communication lines (in that they really cannot be 100% reliable), coupled with the nature of the optical practice (in that it is a retail trading store), it is often not particularly suitable to have a fully online solution. For example, if your broadband link went down for a period, the online solution would mean that the store would have to paper-trade. This is less than ideal.
</p>
<p>
There are many combinations of options, but the main alternative to the scenario described above, and the typical Ocuco solution to overcome its inherent weaknesses, is the ‘Replication’ solution.  Effectively what this means is that each practice has their own local database that IntegraRX runs to, i.e. each practice has their own network, with client PCs accessing a server PC with the IntegraRX database on it, across it. A central database then exists at head office which accumulates all practice information, with the data recorded in each practice ‘replicated’ up to it on an automated schedule (which can be configured from immediate to once a day, etc.); and all changes made in the central site which affect a practice are replicated back down to the practice’s database.
</p>
<p>
It is important to understand that there is no particular difference between these two configurations as far as the general operation of the IntegraRX application is concerned.  Fundamentally, IntegraRX is simply directed to the relevant database, which can exist anywhere once that location is accessible to the client PC on which IntegraRX is running. All of the replication facilities are an integrated part of Oracle’s system software and have little or no impact on the IntegraRX 
Fig. 2: Example of the replication solution
</p>
<p>
In a stand-alone system, the practice environment consists of a server PC which contains its database and zero, one or more client PCs running the IntegraRX software. All information entered into IntegraRX on any client PC is stored in the server database, and only in that server database.
</p>
<p>
In a replication environment, or replicated system, two or more practices are inter-connected over a communication line and information entered in another site is replicated (i.e. copied) to a master database and from there optionally out to other replicated sites in the group. This will ostensibly be the patient clinical information, dispenses and retail data, order information as well as stock control information, since the last time the replication occurred. Also, changes made to the head office master database are replicated down to one or more of the local sites (where those changes are relevant to that store). This will typically be master data changes, discounts and promotions, price files, stock products and changes thereon, etc.
</p>
<p>
It is therefore a pre-requisite to the implementation of IntegraRX Enterprise that the sites involved must be able to connect to one another, as otherwise the replication process itself will not be able to function. 
</p>
<p>
As an aside, it is Ocuco’s preference, for support purposes, that this communication line be over some form of broadband / DSL VPN. ISDN is supported by Ocuco, but makes it quite challenging to give the level of support that Ocuco would prefer to extend to its Enterprise customers. Enterprise environments tend to have a higher level of need (from a support perspective) than normal stand-alone independent practices, and, as such, Ocuco require the best communication lines that can be made available. 

Fig. 3: Overview of the communication lines in an enterprise environment
</p>
<p>

The use of replication in a distributed environment aids the head office to (optionally) centrally manage elements of the business and its data. It also provides the infrastructure whereby the local office(s) may (optionally) have access to information from other practices within the group. Again, this would be decided upon during the planning phase of the Enterprise implementation, where the various scenarios could be worked through, and the pros and cons of each approach explored in order to arrive at the required solution.


</p>

<p>
Leading on from that, there are two distinct ways of setting up a replicated site:
<ol>
<li>
The local site contains only its own information, i.e. its own patients and dispenses and so on. This does not prohibit the head office from carrying out multi-practice functions, but it does prevent the local office from certain operations. For example, the local office cannot view the stock or patients of another practice in the group, simply because it doesn’t have access to that information.</li>

<li>The local site can contain its own information plus the data of all or any given selected practices within the group. This would facilitate multi-practice functionality within the local office, for example the ability to dispense to a patient from another site.</li>
</ol>

</p>
<p>
There is a slight hybrid of the above, whereby if the environment is setup as type 1, other (limited) store information may be accessible by making an online connection to the head office in order to retrieve that information. Note however, that currently within IntegraRX this only applies to customer search facilities (so as to pull down a patient’s record from another store) and at the time of this document being written, the customer transfer facility is still a work in progress (completion of which is expected to be before year end, 2006 ).
</p>
<p>
There are reasons for configuring the system in either manner. In some instances it may be advisable to not share multiple practice information where:
</p>
<p>
<ol>
<li>Practices are not in the same geographical area</li>
<li>It is a franchise operation</li>
<li>The individual practice owners or managers would prefer not to have their data in other practices</li>
<li>The communication line is poor (for example, a 56 Kbps dial-up connection) </li>
<li>The actual volume of data traffic would simply be too large either because of the nature of the data itself, or the number of stores in the enterprise</li>
</ol>
</p>
<p>
Equally there may be good reasons to permit the practices to share other practice’s information particularly where they are in the same geographical area, as it makes significant business sense that a customer can walk into any of those locations and have their full history available.
</p>
<p>
As a general rule, if the organisation has a small number of satellite sites (like fewer than 10) then option 2 is more likely to be chosen. However, if the number of sites is large, then the general recommendation would be for option 1, as the data volumes of transferring all information to all sites would (or could) be prohibitive to the effective running of the replication environment.
</p>
<p>
The actual execution of the replication process (i.e. the commencement of data transfers) is controlled by an Ocuco program referred to as the ’Replication Scheduler’. This can be configured to run the replication at an interval or specific time every day (e.g. after the store has closed). If it is desired that the replication be continuous (or as good as), the interval gets configured to operate more frequently e.g. every minute.
</p>
<p>
The choice of the interval to use must take account of the capability of the communication line, the volume of data being transferred (i.e. from above, if all site data is being transferred), the performance impact on running replication during the day while normal operations are in progress, and the business requirements for having up-to-date data available. 

</p>
<h4><a name="3">Shared Master Data </a></h4>
<p>
IntegraRX Enterprise essentially operates the same way as the stand-alone IntegraRX, however there are some differences. Much of the implementation of the Enterprise system is based on a single concept: the sharing of information across multiple practices.
</p>
<p>
There are a number of reasons why data must be shared, or common, between all sites:
<ul>
<li>At head office: to be able to centrally manage stock to ensure that the same products exist in all stores and to be able (if required) to centrally manage stock pricing for the group.</li>
<li>At head office: to be able to provide other central management functions, for example cross-practice reporting, central recall and marketing mailing</li>
<li>At the local office: if the replicated site is configured to receive the patient list of other stores, then all of the patient-related information must exist in that local site. Otherwise, it would not be able to show the patient’s GP, medical categories, hobbies, marketing categories, etc., because those items of information would not exist at that site. However, because they share common master information, all that data is present when required</li>
<li>At local and head office: to control information which should be consistent across all practices in the group, such as dispensing fees, recall and referral letter templates, examination setup, marketing categories, etc., so that the business can maintain a consistent interface to the customer regardless of the practice involved.  This also promotes the same codes of operation, with users of the application recording consistent information</li>
</p>
<p>
There are some other technical and, ultimately, less important reasons for the reader, but these are not fundamental to the understanding of the concept, and are beyond the scope of this document.
</p>
<p>
There is one main consequence of this data sharing being in place, and that is that the users of the system in all sites must understand that the data is shared. That means that a change made in one location will propagate to all other sites. This can sometimes lead to user mis-understanding of where a change came from or why it was made. For instance, changing or deleting a hobby in one site will propagate that change to all other sites in the group whenever the replication process is next executed. 
</p>
<p>
It is because of this that the system is typically configured to prevent local stores from being able to maintain much of the master data. The practices themselves often resist this, but it is a necessary evil in order to:
<ul>
<li>Maintain business consistency</li>
<li>Prevent tampering</li>
<li>Prevent accidental maintenance</li>
<li>Ensure accuracy of recorded data by only being able to select from pre-defined lists</li>
<li>Prevent ‘cluttering’ of drop down lists by invalid information</li>
<li>Avoid user mis-understanding on missing or changed data content</li>
<li>Internal application and database content reasons</li>
</ul>

</p>
<p>
The actual product and service information is treated as master data. In other words, all products and services must at least exist in all stores (although they can be made available or unavailable on a store by store basis). This must be the case in order to facilitate the accumulation of product and sales reporting at head office. The consequence of this is that the local store has no ability to create new products. This is disabled from all areas of the system which permit new products to be inserted, ie. stock, catalog, dispense, billing, etc. In addition, all other manipulation features are disabled for the local practice, particularly product deletion. That being said, the stores can maintain their own prices and, obviously, all stock quantity handling is local. 
</p>

<h4><a name="4">4	Functionality within IntegraRX </a></h4>
<p>
</p>

<h4> <a name="4.1">4.1 Practice drop down selection</h4>
<a href="#top">Top</a>
<p>
</p>
<h4> <a name="4.2">4.2 Distribution changes</h4>
<a href="#top">Top</a>
<p>
</p>
<h4> <a name="4.3">4.3 Bulk updates</h4>
<a href="#top">Top</a>
<p>
</p>
<h4> <a name="4.4">4.4 Stock transfer</h4>
<a href="#top">Top</a>
<p>
</p>
<h4> <a name="4.5">4.5 Reporting</h4>
<a href="#top">Top</a>
<p>
</p>
<h4> <a name="5">Head Office Value Added</h4>
<a href="#top">Top</a>
<p>
</p>
<h4> <a name="5.1">5.1 Central backup</h4>
<a href="#top">Top</a>
<p>
</p>
<h4> <a name="5.2">5.2 Interfaces with other head office systems</h4>
<a href="#top">Top</a>
<p>
</p>
<h4> <a name="6">Responsibilities</h4>
<a href="#top">Top</a>
<p>
</p>
<h4> <a name="7">Maintenance and support</h4>
<a href="#top">Top</a>
<p>
</p>
<h4> <a name="8">Glossary</h4>
<a href="#top">Top</a>
<p>
</p>

<?php include("footer.php"); ?>