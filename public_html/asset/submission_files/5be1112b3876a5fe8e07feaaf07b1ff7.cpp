#include <iostream>
using namespace std;
int p,m,a,r,g=0;
int main()
{
	cin>>p>>a>>m>>r;
	if(r&m&a&p>=1&&m <= p&& a&p <= 100&&r <= 100000 )	
	{
		while (r>=p)
		{
		r=r-p;
		p=p-a;
		g++;
		}
		
	}
		else
	{
		cout<<"eror";
	}
}

	

