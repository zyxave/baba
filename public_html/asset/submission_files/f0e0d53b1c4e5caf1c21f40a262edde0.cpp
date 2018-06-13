#include<cmath>
#include<iostream>
using namespace std;
int main()
{
	short i,k,t,p,q,z,j;
	int x[26][26],y[26];
	cin>>t;
	for(i=1;i<=25;i++)
		{
			for(j=1;j<=i;j++)
				{
					if(j==1||j==i)
					{
						x[i][j]=1;
					}
					else
					{
						x[i][j]=x[i-1][j-1]+x[i-1][j];
					}
				}
		}
	
	for(k=0;k<t;k++)
	{
		cin>>p>>q;
		z=0;
		for(i=q;i>=0;i--)
			{
				y[i]=x[q+1][z+1]*pow(1,i)*pow(p,z);
				z+=1;
			}
		for(i=q;i>=0;i--)
			{
				if(i==q)
				{
					cout<<"x"<<i<<" ";
				}
				else if(i==0)
				{
					cout<<y[i];
				}
				else if(i==1)
				{
					cout<<y[i]<<"x"<<" ";
				}
				else
				{
					cout<<y[i]<<"x"<<i<<" ";
				}
			}
			if(k<t-1)
			cout<<"\n";
	}
	return 0;
}
