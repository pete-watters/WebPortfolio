package com.wakaleo.samples.ajax.dao;

import java.util.List;

import com.wakaleo.samples.ajax.domain.Library;
import com.wakaleo.samples.ajax.domain.Marker;

public interface LibraryDAO {

	public abstract Library findLibraryById(String id);

	public abstract List<Library> findAll();

	public abstract List<Marker> findAllCityAsMarkers();
	
	public abstract List<Library> findByCity(String city);
	
	public abstract List<Marker> findAllAsMarkers();
	
	public abstract List<Marker> findByCityAsMarkers(String city);
}