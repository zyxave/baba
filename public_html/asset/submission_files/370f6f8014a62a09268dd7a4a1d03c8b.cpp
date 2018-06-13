#include<bits/stdc++.h>
using namespace std;

int n,x,t,hit;

int cek(int x)
{
	if(x==1) return hit;
	hit++;
	return cek(x/2);
}

int main ()
{
	x=1;
	cin>>t;
	for(int i=1;i<=t;i++)
	{
		hit=0;
		cin>>n;
		if(n==1) hit=1;
		cek(n);
		cout<<hit<<endl;
	}
}
