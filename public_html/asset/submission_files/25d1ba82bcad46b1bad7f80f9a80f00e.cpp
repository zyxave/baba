#include<bits/stdc++.h>
using namespace std;

int p,t,a,m,r,hit;

int main ()
{
	cin>>t;
	while(t--)
	{
		cin>>p>>a>>m>>r;
		r-=p;
		p-=a;
		hit=1;
		while(r>=m)
		{
		//	cout<<p<<" "<<a<<" "<<m<<" "<<r<<" "<<hit<<endl;
			if(p<m)
			{
				r-=m;
				hit++;
			}
			else
			{
				r-=p;
				p-=a;
				hit++; 
				
			}
		}
		cout<<hit<<endl;
	}
}
