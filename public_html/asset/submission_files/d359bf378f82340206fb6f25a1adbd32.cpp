//
//  main.cpp
//  D
//
//  Created by vincent alek on 1/6/18.
//  Copyright © 2018 vincent alek. All rights reserved.
//

#include <iostream>
#include <vector>
#include <map>
#include <stdio.h>
#include <string>
#include <string.h>
using namespace std;

vector<string> ans;
map<string,bool> ada;

char up(char c)
{
    if(c >= 'A' && c <= 'Z') return c;
    else return char(c-'a'+'A');
}

int main()
{
    int t; cin >> t;
    while(t--)
    {
        ada.clear();
        ans.clear();
        int n; cin >> n;
        bool bol = 1;
        for(int i = 0; i < n; i++)
        {
            string s, t;
            int spasi = 0;
            cin >> s >> t;
            for(int i = 0; i < s.length(); i++) if(s[i] == ' ') spasi++;
            if(spasi == 2) bol = 0;
        
            string satu = "";
            satu += up(s[0]); satu += up(s[1]); satu += up(s[2]);
            string dua = "";
            dua += up(s[0]); dua += up(s[1]); dua += up(t[0]);
            
            if(!ada[satu])
            {
                ada[satu] = 1;
                ans.push_back(satu);
            }
            else if(!ada[dua])
            {
                ada[dua] = 1;
                ans.push_back(dua);
            }
            else
            {
                bol = 0;
            }
        }
        if(bol)
        {
            for(int i = 0; i < ans.size(); i++)
            {
                cout << ans[i];
                if(i != ans.size()-1) cout << " ";
                else cout << "\n";
            }
        }
        else cout << "GAGAL\n";
        if(t != 0) cout << "\n";
    }
    return 0;
}
