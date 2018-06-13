#include<bits/stdc++.h>
#define ll long long
#define pb push_back
#define mp make_pair
#define fi first
#define se second
using namespace std;
ll t,hs,a,b;
int main()
{
	cin>>t;
	while(t--)
	{
		hs=0;
		cin>>a>>b;
		a=a-b;
		hs+=a/100;
		a%=100;
		hs+=a/20;
		a%=20;
		hs+=a/5;
		a%=5;
		hs+=a/1;
		a%=1;
		cout<<hs<<"\n";
	}
	
}
