package com.wakaleo.samples.ajax.domain;

public class Address {
	String line1;
	String line2;
	String city;
	String postcode;
	String country;
	
	public Address(String line1, String line2, String city, String postcode, String country) {
		super();
		this.line1 = line1;
		this.line2 = line2;
		this.city = city;
		this.postcode = postcode;
		this.country = country;
	}
	
	public String getCity() {
		return city;
	}
	public void setCity(String city) {
		this.city = city;
	}
	public String getCountry() {
		return country;
	}
	public void setCountry(String country) {
		this.country = country;
	}
	public String getLine1() {
		return line1;
	}
	public void setLine1(String line1) {
		this.line1 = line1;
	}
	public String getLine2() {
		return line2;
	}
	public void setLine2(String line2) {
		this.line2 = line2;
	}
	public String getPostcode() {
		return postcode;
	}
	public void setPostcode(String postcode) {
		this.postcode = postcode;
	}
	
}
