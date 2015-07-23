package edu.athens.tennesseevalleyoldtimefiddlersconvention;

import android.os.Bundle;
import android.os.StrictMode;
import android.widget.ArrayAdapter;
import android.app.ListActivity;

import java.io.IOException;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;

import org.xmlpull.v1.XmlPullParser;
import org.xmlpull.v1.XmlPullParserException;
import org.xmlpull.v1.XmlPullParserFactory;

public class Winners extends ListActivity {	

	// items in the RSS feed.
	ArrayList<String> feed = new ArrayList<String>();
	
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_winners);

		// This is bad coding practice, but the heck with it (Don't run network in main!)
		StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
		StrictMode.setThreadPolicy(policy); 

		try {
			URL url = new URL("http://fiddlers.no-ip.org/winners_feed.xml");

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
							feed.add(xpp.nextText());
						}
						// if <description>, get attribute: 'id'						
						if(tagName.equalsIgnoreCase("description")) {
							feed.add(xpp.nextText());
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
		if (feed.isEmpty())
			feed.add("No Winners Posted!");

		// Binding data
		ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, R.layout.xml_list_item, feed);

		setListAdapter(adapter);
    }
	
}
