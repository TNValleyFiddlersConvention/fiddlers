package edu.athens.tennesseevalleyoldtimefiddlersconvention;

import java.io.IOException;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;

import org.xmlpull.v1.XmlPullParser;
import org.xmlpull.v1.XmlPullParserException;
import org.xmlpull.v1.XmlPullParserFactory;

import android.os.Bundle;
import android.os.StrictMode;
import android.widget.ArrayAdapter;
import android.app.ListActivity;

public class Schedule extends ListActivity {
	
	// scheduledEvents storage
	ArrayList<String> scheduledEvents = new ArrayList<String>();
	 
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_schedule);
		
		// This is bad coding practice, but the heck with it (Don't run network in main!)
		StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
		StrictMode.setThreadPolicy(policy); 

		try {
			URL url = new URL("http://gnax-ded350.simplehelix.com/fiddlers/onstage.xml");

			XmlPullParserFactory factory = XmlPullParserFactory.newInstance();
			factory.setNamespaceAware(false);
			XmlPullParser xpp = factory.newPullParser();

			// We will get the XML from an input stream
			xpp.setInput(url.openConnection().getInputStream(), null);
			 
			// Grab any text from the XML feed and stick into the ArrayList.
			int eventType = xpp.getEventType();
			while (eventType != XmlPullParser.END_DOCUMENT) {
				switch(eventType) {
					case XmlPullParser.START_DOCUMENT:
						break;
					case XmlPullParser.START_TAG:
						// get tag name
						String tagName = xpp.getName();
						// if <title>, get attribute: 'id'
						if(tagName.equalsIgnoreCase("title")) {
							scheduledEvents.add(xpp.nextText());
						}
						break;
				}		
				eventType = xpp.next(); //move to next element
			}

			// next feed.
			url = new URL("http://gnax-ded350.simplehelix.com/fiddlers/upnext.xml");
			
			// We will get the XML from an input stream
			xpp.setInput(url.openConnection().getInputStream(), null);
			 
			// Grab any text from the XML feed and stick into the ArrayList.
			eventType = xpp.getEventType();
			while (eventType != XmlPullParser.END_DOCUMENT) {
				switch(eventType) {
					case XmlPullParser.START_DOCUMENT:
						break;
					case XmlPullParser.START_TAG:
						// get tag name
						String tagName = xpp.getName();
						// if <title>, get attribute: 'id'
						if(tagName.equalsIgnoreCase("title")) {
							scheduledEvents.add(xpp.nextText());
						}
						break;
				}		
				eventType = xpp.next(); //move to next element
			}
				
			// next feed.
			url = new URL("http://gnax-ded350.simplehelix.com/fiddlers/events.xml");
			
			// We will get the XML from an input stream
			xpp.setInput(url.openConnection().getInputStream(), null);
			 
			// Grab any text from the XML feed and stick into the ArrayList.
			eventType = xpp.getEventType();
			while (eventType != XmlPullParser.END_DOCUMENT) {
				switch(eventType) {
					case XmlPullParser.START_DOCUMENT:
						break;
					case XmlPullParser.START_TAG:
						// get tag name
						String tagName = xpp.getName();
						// if <title>, get attribute: 'id'
						if(tagName.equalsIgnoreCase("title")) {
							scheduledEvents.add(xpp.nextText());
						}
						break;
				}		
				eventType = xpp.next(); //move to next element
			}					
			
		} catch (MalformedURLException e) {
			e.printStackTrace();
		} catch (XmlPullParserException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		
		// what?!? no content? well, print something.
		if (scheduledEvents.isEmpty())
			scheduledEvents.add("No Schedule Posted!");

		// Binding data
		ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, R.layout.xml_list_item, scheduledEvents);

		setListAdapter(adapter);
    }
	
}
