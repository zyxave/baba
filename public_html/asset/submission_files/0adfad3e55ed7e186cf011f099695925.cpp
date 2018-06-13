#include<bits/stdc++.h>
#define ll long long
using namespace std;
ll t,n,hz,i,j;
string s;
int main()
{
	cin>>t;
	while(t--)
	{
		cin>>n;
		hz=0;
		for(i=1;i<=n;i++)
		{
			cin>>s;
			for(j=0;j<s.length();j++)
			{
				hz+=s[j]-'0';
			}
		}
		if(hz%3==0)
			cout<<"Yes\n";
		else
			cout<<"No\n";
	}
}
