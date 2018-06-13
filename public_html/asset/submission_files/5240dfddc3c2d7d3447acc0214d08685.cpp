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
			//cout<<p<<" "<<a<<" "<<m<<" "<<r<<" "<<hit<<endl;
			if(r-p<m)
			{
				hit+=r/m;
				break;
			}
			else
			{
				if(p-a>0) p-=a;
				r-=p;
				hit++;
			}
		}
		cout<<hit<<endl;
	}
}
