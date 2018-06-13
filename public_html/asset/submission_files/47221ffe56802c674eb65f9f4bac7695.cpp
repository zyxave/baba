#include<bits/stdc++.h>
#define pb push_back
using namespace std;

string ini;
int tc;
vector<int>v;

int main()
{
	cin >> tc;
	while(tc--)
	{
		v.clear();
		cin >> ini;
		int p = ini.size();
		int temp = 0;
		for(int x = 0 ; x < p ; x++)
		{
			if(x == 0)
			{
				temp = 1;
			}
			else if (ini[x] == ini[x-1]) temp++;
			else 
			{
				v.pb(temp);
				temp = 1;
			}
		}
		v.pb(temp);
	
		sort(v.begin(),v.end());
		if(v.size() == 1) 
		{
			printf("YES\n");
			continue;
		}
		
		int ha = v.size();
		int nyak = 0;
		for(int x = 2 ; x < ha ; x++)
		{
			if(v[x] == v[x-1]) nyak++;
		}
		
		if(v[0] == 1 && nyak == ha - 2)
		{
			printf("YES\n");
			continue;
		}
		
		nyak = 0;
		for(int x = 1; x < ha ; x++)
		{
			if(v[x] == v[x-1]) nyak++;
		}
		if(nyak == ha - 1)
		{
			printf("YES\n");
			continue;
		}
		
		nyak = 0;
		for(int x = 1 ; x < ha - 1 ; x++)
		{
			if(v[x] == v[x-1]) nyak++;
		}
		if(nyak == ha - 2 && v[ha - 1] == v[ha - 2] + 1)
		{
			printf("YES\n");
			continue;
		}
		else printf("NO\n");
	}
}
