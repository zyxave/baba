#include<bits/stdc++.h>
using namespace std;

int coin,a,b,t;

int main ()
{
	cin>>t;
	while(t--)
	{
		cin>>a>>b;
		a-=b;
		coin=0;
		if(a/100>0)
		{
			coin+=a/100;
			a%=100;	
		}
		if(a/20>0)
		{
			coin+=a/20;
			a%=20;
		}
		if(a/5>0)
		{
			coin+=a/5;
			a%=5;
		}
		coin+=a;
		cout<<coin<<endl;
	}
}
