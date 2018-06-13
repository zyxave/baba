#include<bits/stdc++.h>
using namespace std;

int p,t,a,m,r,hit;

int main ()
{
	cin>>t;
	while(t--)
	{
		cin>>p>>a>>m>>r;
		if(r>=p) hit=1;
		r-=p;
		while(r>=m)
		{
			cout<<p<<" "<<a<<" "<<m<<" "<<r<<" "<<hit<<endl;
			if(r-p<m)
			{
				r-=m;
				hit++;
			}
			else
			{
				if(p-a>=m) p-=a;
				r-=p;
				hit++;
			}
		}
		cout<<hit<<endl;
	}
}
