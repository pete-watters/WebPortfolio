package com.nextec.client.minimodel.template;

import com.nextec.client.minimodel.admin.company.SlimCompany;
import com.nextec.client.minimodel.template.category.TemplateCategory;
import com.nextec.client.minimodel.template.status.TemplateStatus;



/**
 * Nextec Software
 * @author Patrick Monaghan <Patrick Monaghan at Nextec Software>
 */
public class SlimTemplate implements ISlimTemplate{
    
    private Integer id;
    private String title;
    private String description;
    private Integer generatedCount;
    private SlimCompany partnerCompany;
    private ISlimTemplateVersion currentVersion;
    private ISlimTemplateVersion draftVersion;
    private TemplateStatus status;
    private TemplateCategory category;
    
    public SlimTemplate(){        
            
    }

    /**
     * @return the id
     */
    public Integer getId() {
        return this.id;
    }

    /**
     * @param id the id to set
     */
    public void setId(Integer id) {
        this.id = id;
    }



    /**
     * @return the currentVersion
     */
    public ISlimTemplateVersion getCurrentVersion() {
        return currentVersion;
    }

    /**
     * @param currentVersion the currentVersion to set
     */
    public void setCurrentVersion(ISlimTemplateVersion currentVersion) {
        this.currentVersion = currentVersion;
    }    

    public ISlimTemplateVersion getDraftVersion() {
        return this.draftVersion;
    }

    public void setDraftVersion(ISlimTemplateVersion draft) {
        this.draftVersion = draft;
    }

    /**
     * @return the title
     */
    public String getTitle() {
        return title;
    }

    /**
     * @param title the title to set
     */
    public void setTitle(String title) {
        this.title = title;
    }

    public TemplateStatus getStatus() {
        return this.status;
    }

    public void setStatus(TemplateStatus status) {
        this.status = status;
    }
    public TemplateCategory getCategory() {
        return this.category;
    }

    public void setCategory(TemplateCategory category) {
        this.category = category;
    }

    /**
     * @return the description
     */
    public String getDescription() {
        return description;
    }

    /**
     * @param description the description to set
     */
    public void setDescription(String description) {
        this.description = description;
    }

    /**
     * @return the partnerCompany
     */
    public SlimCompany getPartnerCompany() {
        return partnerCompany;
    }

    /**
     * @param partnerCompany the partnerCompany to set
     */
    public void setPartnerCompany(SlimCompany partnerCompany) {
        this.partnerCompany = partnerCompany;
    }

    /**
     * @return the generatedCount
     */
    public Integer getGeneratedCount() {
        return generatedCount;
    }

    /**
     * @param generatedCount the generatedCount to set
     */
    public void setGeneratedCount(Integer downloadCount) {
        this.generatedCount = downloadCount;
    }
}
