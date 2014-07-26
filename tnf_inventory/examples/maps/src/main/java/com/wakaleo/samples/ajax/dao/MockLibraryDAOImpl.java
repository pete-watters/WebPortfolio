package com.wakaleo.samples.ajax.dao;

import java.util.ArrayList;
import java.util.Collection;
import java.util.HashMap;
import java.util.HashSet;
import java.util.List;
import java.util.Map;
import java.util.Set;

import com.wakaleo.samples.ajax.domain.Address;
import com.wakaleo.samples.ajax.domain.Library;
import com.wakaleo.samples.ajax.domain.Marker;

public class MockLibraryDAOImpl implements LibraryDAO {

	//
	// Test data
	//
	private static final Map libraries = new HashMap(); 
	static {
		libraries.put("1", new Library("1","WN","New Zealand National Library",
                new Address("70 Molesworth Street","",
             		       "Wellington","6000","New Zealand"),"http://www.natlib.govt.nz",
             		       "Wellington",-41.28,-185.22));
		
		libraries.put("2", new Library("2","WMET","Meteorological Service of New Zealand (MetService) Library",
                new Address("30 Salamanca Road","Kelburn",
             		       "Wellington","6000","New Zealand"),null,
             		       "Wellington",-41.28,-185.25));
		libraries.put("3", new Library("3","ATU","Auckland University of Technology Library",
                new Address("55-57 Wellesley Street","",
             		       "Auckland","1000","New Zealand"),null,
             		      "Auckland",-36.87,-185.22));
		libraries.put("4", new Library("4","ACL","Auckland City Library",
                new Address("55-57 Green Street","",
             		       "Auckland","1000","New Zealand"),null,
             		      "Auckland",-36.27,-185.22));
		libraries.put("5", new Library("5","AWML","Auckland War Memorial Library",
                new Address("55-57 Green Street","",
             		       "Auckland","1000","New Zealand"),null,
             		      "Auckland",-36.77,-185.92));
		libraries.put("6", new Library("6","TBT","Library of Dunedin",
                new Address("57 Forest Street","",
             		       "Dunedin","1000","New Zealand"),null,
             		      "Dunedin",-45.88,170.48));
		libraries.put("7", new Library("7","TBT","Library of ChristChurch",
                new Address("57 Forest Street","",
             		       "ChristChurch","1000","New Zealand"),null,
             		      "ChristChurch",-43.53333,172.63333));
		libraries.put("8", new Library("8","TBT","Library of Hamilton",
                new Address("57 Forest Street","",
             		       "Hamilton","1000","New Zealand"),null,
             		      "Hamilton",-45.88,170.48));
    }	
	/* (non-Javadoc)
	 * @see com.wakaleo.samples.ajax.dao.LibraryDAO#findLibraryById(java.lang.String)
	 */
	public Library findLibraryById(String id) {
		return (Library) libraries.get(id);
	}	
	
	public List<Library>  findAll() {
		List results = new ArrayList();
		Collection<Library> allLibraries = libraries.values();
		for(Library library : allLibraries) {
			results.add(library);
		}
		return results;
	}

	public List<Marker> findAllAsMarkers() {
		List results = new ArrayList();
		Collection<Library> allLibraries = libraries.values();
		for(Library library : allLibraries) {
			results.add(new Marker(library.getId(),
					               library.getName(),
					               library.getLatitude(),
					               library.getLongitude()));
		}
		return results;
	}
	
	public List<Library> findByCity(String city) {
		List<Library> allLibraries = findAll();
		List results = new ArrayList();
		for(Library library : allLibraries) {
			if (library.getCity().equals(city)) {
				results.add(library);

			}
		}
		return results;
	}
	
	public List<Marker> findAllCityAsMarkers() {
		List<Library> allLibraries = findAll();
		List results = new ArrayList();
		Set cities = new HashSet();
		for(Library library : allLibraries) {
			if (!cities.contains(library.getCity())) {
				int cityCount = countLibrariesByCity(library.getCity());
				results.add(new Marker(library.getCity(),
						               library.getCity() + " - libraries: "+ cityCount,
						               library.getLatitude(),
						               library.getLongitude()));
				cities.add(library.getCity());
			}
		}
		return results;
	}
	
	private int countLibrariesByCity(String city) {
		// TODO Auto-generated method stub
		int count = 0;
		List<Library> allLibraries = findAll();
		for(Library library : allLibraries) {
			if (library.getCity().equals(city)) {
				count++;
			}
		}
		
		return count;
	}

	public List<Marker> findByCityAsMarkers(String city) {
		List<Library> allLibraries = findAll();
		List results = new ArrayList();
		for(Library library : allLibraries) {
			if (library.getCity().equals(city)) {
				results.add(new Marker(library.getId(),
			               library.getName(),
			               library.getLatitude(),
			               library.getLongitude()));

			}
		}
		return results;
	}
	
}

