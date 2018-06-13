#include<bits/stdc++.h>
#define ll long long
#define pb push_back
#define mp make_pair
#define fi first
#define se second
using namespace std;
ll t,n,i;
string s[1010];
int main()
{
	cin>>t;
	while(t--)
	{
		cin>>n;
		for(i=1;i<=n;i++)
			cin>>s[i];
		sort(s+1,s+1+n);
		for(i=1;i<=n;i++)
			cout<<s[i]<<"\n";
		if(t>0)
			cout<<"\n";
	}
	
}
