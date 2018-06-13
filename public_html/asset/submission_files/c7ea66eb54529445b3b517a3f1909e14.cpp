#include<iostream>
using namespace std;
int main()
{
	int i,k,t,p,m,a,r,c,d;
	cin>>t;
	for(k=1;k<=t;k++)
	{
		cin>>p>>a>>m>>r;
		c=0;
		d=p;
		while(r>=d)
		{
			c+=1;
			r=r-d;
			d=d-a;
			if(d<m)
				d=m;
			
		}
		cout<<c<<"\n";
	}
}
