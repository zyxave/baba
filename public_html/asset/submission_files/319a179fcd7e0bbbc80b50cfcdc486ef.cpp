#include<iostream>
using namespace std;
int main()
{
	int i,t,p,m,a,r,c;
	cin>>t;
	for(i=0;i<t;i++)
	{
		c=0;
		cin>>p>>a>>m>>r;
		while(r>m)
		{
			r=r-p;
			if(p-a>m)
			{
				p=p-a;
			}
			else
			{
				p=m;
			}
			c+=1;
		}
		cout<<c;
	}
}
