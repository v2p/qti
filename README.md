# What is it?

In 2013 I was developing support of QTI standard for one project. For those who doesn't know what does the abbreviation QTI mean I leave this link: https://en.wikipedia.org/wiki/QTI. Generally speaking QTI - is a term from Learning Management Systems domain and it stands for some kind of interoperable format of learning materials.
  
So this repository contains scaffolding of the tool which later has been improved and redeveloped to suit other requirements. Eventually evolution has changed the codebase. Later I figured that some design decisions were not so good as it was looking before. But I've kept this repository. Since the QTI is a relatively rare used format (at least it was rare used in 2013) there is a non-zero chance that the repo may be useful to somebody.

## Few notes and warnings

* Later I've learned it wasn't a good idea to create separate PHP class per QTI item. It's allowed to use HTML tags as a QTI items, so it was a bit strange when we were creating dumb PHP classes just because of design weirdness.  
* Consider this repository as a prototype. Personally I'm not a big fan of Singleton pattern using (like I did for Config instance). Use Dependency Injection with Service Locator pattern instead.
* If you want just to export your data model to QTI format, think about plain XML generation. Using of intermediate PHP objects tree could be an overkill. Unless you need to do some kind of validation before. But even in that case you could use well-defined (and probably already public available) XSD schema for selected QTI version.

Good luck! Hope this small article was useful.