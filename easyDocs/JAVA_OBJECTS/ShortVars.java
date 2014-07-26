
    /* 	///////////////////////////////////////////////////////////////////////////////////////////*/
    public class SlimTemplate implements ISlimTemplate{    
    /* 	///////////////////////////////////////////////////////////////////////////////////////////*/
	    private Integer id;
	    private String title;
	    private String description;
	    private Integer generatedCount;
	    private SlimCompany partnerCompany;
	    private ISlimTemplateVersion currentVersion;
	    private ISlimTemplateVersion draftVersion;
	    private TemplateStatus status;
	    private TemplateCategory category;
    

    /* 	///////////////////////////////////////////////////////////////////////////////////////////*/
    public class SlimCompany  implements ISlimObject {
    /* 	///////////////////////////////////////////////////////////////////////////////////////////*/
	     private Integer id;
	     private String name;
	     private String mail;
	     private String shortCode;
	     private boolean docDownloadPasswordProtected;
	     private String docPassword;
	     private Boolean defaultUserProvided;
	     private String defaultUserFullName;
	     private String defaultUsername;
	     private String defaultUserPassword;
	     private CompanyType type;
	     private CompanyStatus status;
	     private SlimImage logo;


    /* 	///////////////////////////////////////////////////////////////////////////////////////////*/
	public enum TemplateCategory {
    /* 	///////////////////////////////////////////////////////////////////////////////////////////*/
	    CompanyDocument,
	    JobDocument,
	    EmployeeDocument    // TODO: These are just samples
    

    /* 	///////////////////////////////////////////////////////////////////////////////////////////*/
	public enum TemplateStatus {
    /* 	///////////////////////////////////////////////////////////////////////////////////////////*/
	    Active,
	    Suspended,
	    Deleted // TODO: Fill this out properly
    


    /* 	///////////////////////////////////////////////////////////////////////////////////////////*/
	public class SlimImage implements ISlimObject {
    /* 	///////////////////////////////////////////////////////////////////////////////////////////*/

	    private Integer id;
	    private String fileName;
	    private String url;
	    private SlimCompany company;


public interface ISlimObject extends java.io.Serializable {
//public interface ISlimObject extends IsSerializable {

}
