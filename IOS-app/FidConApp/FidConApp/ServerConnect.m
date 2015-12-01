//
//  WinnerModel.m
//  jsonTest
//
//  Created by Admin on 10/23/15.
//  Copyright (c) 2015 Admin. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "ServerConnect.h"

@implementation ServerConnect

- (NSArray *)downloadItems:(NSString*)url
{
    
    NSURL *jsonFileUrl = [NSURL URLWithString:url];
    NSURLRequest *urlRequest = [[NSURLRequest alloc] initWithURL:jsonFileUrl];
    NSURLResponse *response = nil;
    NSData *data = [NSURLConnection sendSynchronousRequest:urlRequest returningResponse: &response error:nil];
    
    NSArray *Entry = [NSJSONSerialization JSONObjectWithData:data options:0 error:nil];
    return Entry;
    
}
@end