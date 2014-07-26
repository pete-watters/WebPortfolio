package com.wakaleo.samples.ajax.servlets;

import java.io.IOException;
import java.util.List;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.thoughtworks.xstream.XStream;
import com.wakaleo.samples.ajax.dao.LibraryDAO;
import com.wakaleo.samples.ajax.dao.MockLibraryDAOImpl;
import com.wakaleo.samples.ajax.domain.Library;
import com.wakaleo.samples.ajax.domain.Marker;

/**
 * Servlet implementation class for Servlet: LibraryDetailsServlet
 *
 */
 public class LibraryDirectoryServlet extends javax.servlet.http.HttpServlet implements javax.servlet.Servlet {
    /* (non-Java-doc)
	 * @see javax.servlet.http.HttpServlet#HttpServlet()
	 */
	public LibraryDirectoryServlet() {
		super();
	}   	
	
	LibraryDAO libraryDao = null;
	
	public void setLibraryDao(LibraryDAO libraryDao) {
		this.libraryDao = libraryDao;
	}
	private LibraryDAO getLibraryDAO() {
		if (libraryDao == null) {
			libraryDao = new MockLibraryDAOImpl();
		}
		return libraryDao;
	}
	
	/* (non-Java-doc)
	 * @see javax.servlet.http.HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String method=request.getParameter("method");
		XStream xstream = new XStream();
		xstream.alias("marker", Marker.class);
		response.setContentType("application/xml");
		if (method == null) {
			xstream.alias("library", Library.class);
			String id = request.getParameter("id");
			Library library = getLibraryDAO().findLibraryById(id);
			String xml = xstream.toXML(library);
			response.getWriter().write(xml);
		} else if (method.equals("findAll")) {
			List<Marker> libraries = getLibraryDAO().findAllAsMarkers();
			String xml = xstream.toXML(libraries);
			response.getWriter().write(xml);
		} else if (method.equals("findAllCities")) {
			List<Marker> cities = getLibraryDAO().findAllCityAsMarkers();
			String xml = xstream.toXML(cities);
			response.getWriter().write(xml);
		} else if (method.equals("findByCity")) {
			String city = request.getParameter("city");
			List<Marker> libraries = getLibraryDAO().findByCityAsMarkers(city);
			String xml = xstream.toXML(libraries);
			response.getWriter().write(xml);
		}
	}  	
}