//
//  main.cpp
//  B
//
//  Created by vincent alek on 1/6/18.
//  Copyright © 2018 vincent alek. All rights reserved.
//

#include <iostream>
#include <vector>
#include <utility>
#include <map>
#include <math.h>
#include <algorithm>
#include <stdio.h>
#include <string.h>
using namespace std;
int cnt[300];
int cnt2[300];
int main()
{
    int t; cin >> t;
    while(t--)
    {
        string s; cin >> s;
        memset(cnt, 0, sizeof(cnt));
        memset(cnt2, 0, sizeof(cnt2));
        if(s.length() <= 3)
        {
            cout << "YES\n";
            return 0;
        }
        for(int i = 0; i < s.length(); i++) cnt[s[i]]++;
        int temp = 0;
        for(int i = 'a'; i <= 'z'; i++)
        {
            if(cnt[i] == 0) continue;
            
            cnt2[cnt[i]]++;
            if(cnt2[cnt[i]] == 2) temp = cnt[i];
        }
        //cout << temp << " " << cnt[temp] << "\n";
        if(temp*cnt2[temp] == s.length() ||
           temp*cnt2[temp]+(temp+1) == s.length() ||
           temp*cnt2[temp]+1 == s.length())
        {
            cout << "YES\n";
        }
        else
        {
            cout << "NO\n";
        }
        
    }
    return 0;
}

