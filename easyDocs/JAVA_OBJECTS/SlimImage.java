package com.nextec.client.minimodel.util;

import com.nextec.client.minimodel.admin.company.SlimCompany;
import com.nextec.client.minimodel.base.ISlimObject;

/**
 *
 * @author Alan Hayes
 */
public class SlimImage implements ISlimObject {

    private Integer id;
    private String fileName;
    private String url;
    private SlimCompany company;

     /**
      * 
      */
    public SlimImage() {
    }

    public void setId(Integer id)
    {
        this.id = id;
    }
    
    public Integer getId()
    {
        return id;
    }

    /**
     *
     * @return
     */
    public String getFileName() {
        return this.fileName;
    }

    /**
     *
     */
    public void setFileName(String fileName) {
        this.fileName = fileName;
    }

    /**
     *
     * @return
     */
    public String getURL() {
        return this.url;
    }

    /**
     *
     */
    public void setURL(String url) {
        this.url = url;
    }

    /**
     *
     * @return
     */
    public SlimCompany getCompany() {
        return this.company;
    }

    /**
     *
     */
    public void setCompany(SlimCompany company) {
        this.company = company;
    }
}
