package com.wakaleo.samples.ajax.domain;

public class Library {
	String id;
	String symbol;
	String name;
	String website;
	Address address;
	String city;
	double latitude;
	double longitude;

	public Library(String id, String symbol, String name, Address address, String website,
			       String city, double latitude, double longitude) {
		super();
		this.id = id;
		this.symbol = symbol;
		this.name = name;
		this.address = address;
		this.website = website;
		this.city = city;
		this.latitude = latitude;
		this.longitude = longitude;
	}
	public Address getAddress() {
		return address;
	}
	public void setAddress(Address address) {
		this.address = address;
	}
	public String getId() {
		return id;
	}
	public void setId(String id) {
		this.id = id;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getSymbol() {
		return symbol;
	}
	public void setSymbol(String symbol) {
		this.symbol = symbol;
	}
	
	public String getCity() {
		return city;
	}
	public void setCity(String city) {
		this.city = city;
	}
	public double getLatitude() {
		return latitude;
	}
	public void setLatitude(double latitude) {
		this.latitude = latitude;
	}
	public double getLongitude() {
		return longitude;
	}
	public void setLongitude(double longitude) {
		this.longitude = longitude;
	}
	public String getWebsite() {
		return website;
	}
	public void setWebsite(String website) {
		this.website = website;
	}	
}
