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
            for(int i = x; i >= y; i--) dp[i] = 2e9;
            dp[x] = 0;
            for(int i = x; i >= y; i--)
            {
                dp[i-1] = min(dp[i-1], dp[i]+a);
                dp[i/2] = min(dp[i/2], dp[i]+b);
            }
            ans.push_back({dp[y], s});
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
