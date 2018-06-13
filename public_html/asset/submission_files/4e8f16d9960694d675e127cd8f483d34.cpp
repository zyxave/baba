#include<bits/stdc++.h>
using namespace std;
int t,n,a,b,bo[100][100][100],leng,spasi,spas[10005];
char s[105][105];
bool boo;
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d",&n);gets(s[0]);memset(bo,0,sizeof(bo));spasi=0;boo=false;
		for(a=0;a<n;a++)
		{
			gets(s[a]);leng=strlen(s[a]);spasi=0;//printf("%s\n",s[a]);
			for(b=0;b<leng;b++)
			{
				if(s[a][b]==' ') spasi++,spas[a]=b+1;
			}
			if(spasi>1 || spasi<1)
			{
				boo=true;
				//printf("1111111111111\n");
			}
		}
		if(boo==false)
		{
			for(a=0;a<n;a++)
			{
				if(bo[s[a][0]][s[a][1]][s[a][2]]==0)
				{
					printf("",s[a][0],s[a][1],s[a][2]);
					bo[s[a][0]][s[a][1]][s[a][2]]=1;
				}
				else
				{
					if(bo[s[a][0]][s[a][1]][spas[a]]==0)
					{
						printf("",s[a][0],s[a][1],s[a][spas[a]]);
					}
					else
					{
						boo=true;
					//	printf("2222222222\n");
					}
				}
			}
		}
		memset(bo,0,sizeof(bo));int uu=0;
		if(boo==false)
		{
			for(a=0;a<n;a++)
			{
				if(bo[s[a][0]][s[a][1]][s[a][2]]==0)
				{
					if(uu>0) printf(" ");
					printf("%c%c%c",s[a][0],s[a][1],s[a][2]);
					bo[s[a][0]][s[a][1]][s[a][2]]=1;
					uu++;
				}
				else
				{
					if(bo[s[a][0]][s[a][1]][spas[a]]==0)
					{
						if(uu>0) printf(" ");
						printf("%c%c%c",s[a][0],s[a][1],s[a][spas[a]]);
						uu++;
					}
				}
			}
		}
		else printf("GAGAL");
		printf("\n");
	}
}
