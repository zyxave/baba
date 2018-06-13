#include<bits/stdc++.h>
using namespace std;
int T,a,b,c,d,e=0;
int main()
{
	cin>>T;
	for (a=1;a<=T;a++)
	{
		cin>>b;
		for (c=1;c<=b;c++)
		{
		cin>>d;
		e=e+d;
		}
		if (e%3==0)
		{
			cout<<"yes\n";
		}
		else 
		{
			cout<<"no\n";
			return 0;
		}
	}

}


