//
//  main.cpp
//  D
//
//  Created by vincent alek on 1/3/18.
//  Copyright © 2018 vincent alek. All rights reserved.
//

#include <iostream>
#include <algorithm>
#include <string>
#include <vector>
using namespace std;

vector<string> vec;
bool bol(string a, string b)
{
    if(a.size() != b.size()) return a.size() < b.size();
    else return a < b;
}

int main()
{
    int t; cin >> t;
    while(t--)
    {
        int n; cin >> n;
        for(int i = 0; i < n; i++)
        {
            string s; cin >> s;
            vec.push_back(s);
        }
        sort(vec.begin(), vec.end());
        for(int i = 0; i < n; i++)
        {
            cout << vec[i] << "\n";
        }
        if(t != 0) cout << "\n";
    }
    return 0;
}
