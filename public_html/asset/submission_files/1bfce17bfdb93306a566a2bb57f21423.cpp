//
//  main.cpp
//  E
//
//  Created by vincent alek on 1/6/18.
//  Copyright © 2018 vincent alek. All rights reserved.
//

#include <iostream>
#include <vector>
#include <algorithm>
#include <queue>
#include <utility>
using namespace std;

vector<pair<int,string> > ans;

int dp[100003];


int main()
{
    int t; cin >> t;
    while(t--)
    {
        ans.clear();
        int n, x, y;
        cin >> n >> x >> y;
        while(n--)
        {
            string s; cin >> s;
            string temp; cin >> temp;
            int a, b; cin >> a >> b;
            int now = x;
            int res = 0;
            while(now > y)
            {
                int next = now/2;
                
                if(next < y)
                {
                    res += (now-y)*a;
                    now = y;
                }
                else
                {
                    if(b > (now-next)*a) res += (now-next)*a;
                    else res += b;
                    now = next;
                }
            }
            ans.push_back({res,s});
        }
        sort(ans.begin(), ans.end());
        for(int i = 0; i < ans.size(); i++)
        {
            cout << ans[i].second << " : " << ans[i].first << "\n";
            if(i+1 == ans.size() && t != 0) cout << "\n";
        }
    }
    return 0;
}
