package com.nextec.client.minimodel.admin.company;

import com.nextec.client.minimodel.base.ISlimObject;
import com.nextec.client.minimodel.util.SlimImage;

/**
 *
 * @author ahayes
 */
public class SlimCompany  implements ISlimObject {


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

    /**
      *
      */
    public SlimCompany() {
    }

	
    /**
     *
     * @param id
     */
    public SlimCompany(Integer id) {
        this.id = id;
    }

    /**
     *
     * @param id
     * @param name
     */
    public SlimCompany(Integer id, String name) {
       this.id = id;
       this.name = name;
    }
   
    /**
     * 
     * @return
     */
    public Integer getId() {
        return this.id;
    }
    
    /**
     *
     * @param id
     */
    public void setId(Integer id) {
        this.id = id;
    }
    
    /**
     *
     * @return
     */
    public String getName() {
        return this.name;
    }
    
    /**
     *
     * @param name
     */
    public void setName(String name) {
        this.name = name;
    }

    /**
     * @return the mail
     */
    public String getMail() {
        return mail;
    }

    /**
     * @param mail the mail to set
     */
    public void setMail(String mail) {
        this.mail = mail;
    }

    /**
     * @return the shortCode
     */
    public String getShortCode() {
        return shortCode;
    }

    /**
     * @param shortCode the shortCode to set
     */
    public void setShortCode(String shortCode) {
        this.shortCode = shortCode;
    }

    /**
     *
     * @return
     */
    public boolean getDocDownloadPasswordProtected() {
        return this.docDownloadPasswordProtected;
    }

    /**
     *
     * @param name
     */
    public void setDocDownloadPasswordProtected(boolean docDownloadPasswordProtected) {
        this.docDownloadPasswordProtected = docDownloadPasswordProtected;
    }

    /**
     *
     * @return
     */
    public String getDocPassword() {
        return this.docPassword;
    }

    /**
     *
     * @param name
     */
    public void setDocPassword(String docPassword) {
        this.docPassword = docPassword;
    }

    /**
     * @return the defaultUserProvided
     */
    public Boolean getDefaultUserProvided() {
        return defaultUserProvided;
    }

    /**
     * @param defaultUserProvided the defaultUserProvided to set
     */
    public void setDefaultUserProvided(Boolean defaultUserProvided) {
        this.defaultUserProvided = defaultUserProvided;
    }

    /**
     * @return the defaultUserFullName
     */
    public String getDefaultUserFullName() {
        return defaultUserFullName;
    }

    /**
     * @param defaultUserFullName the defaultUserFullName to set
     */
    public void setDefaultUserFullName(String defaultUserFullName) {
        this.defaultUserFullName = defaultUserFullName;
    }

    /**
     * @return the defaultUsername
     */
    public String getDefaultUsername() {
        return defaultUsername;
    }

    /**
     * @param defaultUsername the defaultUsername to set
     */
    public void setDefaultUsername(String defaultUsername) {
        this.defaultUsername = defaultUsername;
    }

    /**
     * @return the defaultUserPassword
     */
    public String getDefaultUserPassword() {
        return defaultUserPassword;
    }

    /**
     * @param defaultUserPassword the defaultUserPassword to set
     */
    public void setDefaultUserPassword(String defaultUserPassword) {
        this.defaultUserPassword = defaultUserPassword;
    }

    /**
     * @return the type
     */
    public CompanyType getType() {
        return type;
    }

    /**
     * @param type the type to set
     */
    public void setType(CompanyType type) {
        this.type = type;
    }

    /**
     * @return the status
     */
    public CompanyStatus getStatus() {
        return status;
    }

    /**
     * @param status the status to set
     */
    public void setStatus(CompanyStatus status) {
        this.status = status;
    }

    /**
     * @return the logo
     */
    public SlimImage getLogo() {
        return logo;
    }

    /**
     * @param logo the logo to set
     */
    public void setLogo(SlimImage logo) {
        this.logo = logo;
    }

}
